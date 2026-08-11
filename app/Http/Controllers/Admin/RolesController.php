<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RolesController extends Controller
{
    /**
     * Assign roles to a user.
     *
     * @param Request $request
     * @param User $user
     * @return RedirectResponse
     */
    public function assignRoles(Request $request, User $user): RedirectResponse
    {
        $request->validate([
            'roles.*' => ['exists:roles,id'],
        ]);

        $authUser = Auth::user();

        $authUserRoleIds = $authUser->roles->pluck('id')->toArray();

        $superAdminId = Role::where(Role::SUPER_ADMIN)->value('id');

        $isAuthUserSuperAdmin = in_array($superAdminId, $authUserRoleIds);

        if (
            $authUser->id === $user->id &&
            $isAuthUserSuperAdmin &&
            ! in_array($superAdminId, $request->roles ?? [])
        ) {
            return back()->with(
                'error',
                'Не може да премахнете super_admin от собствения си акаунт!'
            );
        }

        $user->roles()->sync($request->roles ?? []);

        return back()->with(
            'success',
            'Промените бяха запазени успешно!'
        );
    }
}
