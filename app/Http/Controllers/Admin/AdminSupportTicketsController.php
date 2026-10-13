<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SupportTicket;
use Illuminate\View\View;

class AdminSupportTicketsController extends Controller
{
    /**
     * Display all support tickets.
     *
     * @return View
     */
    public function index(): View
    {
        $tickets = SupportTicket::with('user')
            ->latest()
            ->paginate(15);

        return view('admin.Tickets.Index', [
            'tickets' => $tickets,
        ]);
    }

    /**
     * Display a single support ticket.
     *
     * Read-only view.
     *
     * @param SupportTicket $supportTicket
     * @return View
     */
    public function show(SupportTicket $supportTicket): View
    {
        $supportTicket->load('user');

        return view('admin.Tickets.Show', [
            'ticket' => $supportTicket,
        ]);
    }


}
