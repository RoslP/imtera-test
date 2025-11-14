<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class IndexController extends Controller{
    public function index()
    {
        if (Auth::check()) {
            return Inertia::location('/dashboard');
        }

        return Inertia::location('/login');
    }
}
