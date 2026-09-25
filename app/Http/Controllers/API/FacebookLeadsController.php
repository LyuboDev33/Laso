<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Admin\API\Lead;
use App\Models\Admin\LeadForm;
use App\Models\User;
use App\Services\FacebookService;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class FacebookLeadsController extends Controller
{
    public function __construct(
        private FacebookService $facebookLeadsService
    ) {}

    /**
     * Display all users with their Facebook lead forms and leads.
     *
     * @return View
     */
    public function index(): View
    {
        $users = User::with([
            'facebookForms',
            'leads' => function ($query) {
                $query->orderBy('facebook_created_at', 'desc');
            },
        ])->orderBy('id', 'desc')->paginate(15);

        return view('admin.Leads.Index', [
            'users' => $users,
        ]);
    }

    /** Show all for a specific user
     *
     * @return View
     */
    public function myLeads(): View
    {
        $user = Auth::user()->load('facebookForms');
        $leads = Lead::with('leadForm')
            ->where('user_id', Auth::id())
            ->orderBy('facebook_created_at', 'desc')
            ->paginate(100);

        return view('Backend.myleads', [
            'user' => $user,
            'leads' => $leads,
        ]);
    }

    /**
     * Add a Facebook form ID to a user.
     *
     * @param Request $request
     * @param User $user
     * @return JsonResponse
     */
    public function addFormId(Request $request, User $user): JsonResponse
    {
        $request->validate([
            'form_id' => ['required', 'string', 'max:255', 'unique:lead_forms,form_id'],
        ]);

        $facebookForm = LeadForm::create([
            'user_id' => $user->id,
            'form_id' => trim($request->form_id),
        ]);

        $html = view('admin.Leads.partials.form-chip', [
            'facebookForm' => $facebookForm,
        ])->render();

        return response()->json([
            'success' => true,
            'html' => $html,
        ]);
    }

    /**
     * Update an existing Facebook form ID.
     *
     * @param Request $request
     * @param LeadForm $leadForm
     * @return RedirectResponse
     */
    public function updateFormId(Request $request, LeadForm $leadForm): RedirectResponse
    {
        $request->validate([
            'form_id' => ['required', 'string', 'max:255', 'unique:lead_forms,form_id,' . $leadForm->id],
        ]);

        $leadForm->update([
            'form_id' => trim($request->form_id),
        ]);

        return back()->with('success', 'Facebook Form ID беше обновен успешно.');
    }

    /**
     * Delete a Facebook form ID.
     *
     * @param LeadForm $leadForm
     * @return JsonResponse
     */
    public function deleteFormId(LeadForm $leadForm): JsonResponse
    {
        $leadForm->delete();

        return response()->json([
            'success' => true,
            'message' => 'Facebook Form ID беше изтрит успешно.',
        ]);
    }

    /**
     * Fetch and insert leads from all submitted Facebook forms.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function insertLeads(Request $request): RedirectResponse
    {
        $request->validate([
            'form_ids' => ['required', 'array'],
            'form_ids.*' => ['array'],
            'form_ids.*.*' => ['required', 'string', 'max:255'],
        ]);

        try {
            $formIds = collect($request->form_ids)
                ->flatten()
                ->filter()
                ->unique()
                ->values()
                ->toArray();

            if (empty($formIds)) {
                return back()->with('error', 'Няма добавени Facebook Form ID-та.');
            }

            $facebookResults = $this->facebookLeadsService->leadsBulkRequest($formIds);

            $leadForms = LeadForm::whereIn('form_id', $formIds)
                ->get()
                ->keyBy('form_id');

            $insertedLeads = 0;

            foreach ($facebookResults as $formId => $result) {
                $leadForm = $leadForms->get($formId);

                if (!$leadForm) {
                    continue;
                }

                $leads = $result['data'] ?? [];

                foreach ($leads as $facebookLead) {
                    $fields = [];

                    foreach ($facebookLead['field_data'] ?? [] as $field) {
                        $fieldName = $field['name'] ?? null;

                        if (!$fieldName) {
                            continue;
                        }

                        $fields[$fieldName] = $field['values'][0] ?? null;
                    }

                    $fullName = $fields['full_name'] ?? null;
                    $email = $fields['email'] ?? null;
                    $phone = $fields['phone'] ?? $fields['phone_number'] ?? null;

                    $questions = array_filter(
                        $fields,
                        function ($key) {
                            return !in_array($key, [
                                'full_name',
                                'email',
                                'phone',
                                'phone_number',
                            ]);
                        },
                        ARRAY_FILTER_USE_KEY
                    );

                    Lead::updateOrCreate(
                        [
                            'facebook_lead_id' => $facebookLead['id'],
                        ],
                        [
                            'user_id' => $leadForm->user_id,
                            'lead_form_id' => $leadForm->id,
                            'facebook_ad_id' => $facebookLead['ad_id'] ?? null,
                            'full_name' => $fullName,
                            'email' => $email,
                            'phone' => $phone,
                            'questions' => $questions,
                            'facebook_created_at' => isset($facebookLead['created_time'])
                                ? Carbon::parse($facebookLead['created_time'])
                                : null,
                        ]
                    );

                    $insertedLeads++;
                }
            }

            return back()->with(
                'success',
                "{$insertedLeads} Facebook лийда бяха интегрирани успешно."
            );
        } catch (\Exception $exception) {
            return back()->with('error', $exception->getMessage());
        }
    }

    /** Check if the lead has been seen
     *
     * @param Request $request
     * @param Lead $lead
     * @return JsonResponse
     */
    public function updateSeen(Request $request, Lead $lead): JsonResponse
    {
        $validated = $request->validate([
            'is_seen' => ['required', 'boolean'],
        ]);

        $lead->update([
            'is_seen' => $validated['is_seen'],
        ]);

        return response()->json([
            'success' => true,
            'is_seen' => $lead->is_seen,
        ]);
    }
}
