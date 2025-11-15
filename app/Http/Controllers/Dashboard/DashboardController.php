<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response;

class DashboardController extends Controller
{
    public function render(): Response
    {
        return Inertia::render(
            'Dashboard',
            ['login'=>auth()->user()->login],
        );
    }
}
