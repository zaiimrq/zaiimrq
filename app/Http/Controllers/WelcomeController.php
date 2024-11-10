<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        if (! Auth::check()) {
            Auth::loginUsingId(1);
        }
        
        $projects = Project::take(6)->get();

        return view('welcome', compact('projects'));
    }
}
