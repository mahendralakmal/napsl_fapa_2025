<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ImpersonateController extends Controller
{
    public function impersonate(User $user)
    {
        auth()->user()->impersonate($user->id);
        return redirect('/')->with('success', 'Now impersonating user: ' . $user->name);
    }

    public function stop()
    {
        auth()->user()->stopImpersonate();
        return redirect('/admin/dashboard')->with('success', 'Stopped impersonation.');
    }
}
