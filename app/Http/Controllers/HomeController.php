<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        // Example: send different data based on role
          
            return view('home');
        
        abort(403, 'Unauthorized');
    }
}
