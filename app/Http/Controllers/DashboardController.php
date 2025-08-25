<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\School_Classes;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $total_teachers=Teacher::count();
         $total_students=Student::count();
$total_users = User::where('role', 'admin')->count();
$total_classes=School_classes::count();
        // You can also pass data to the view here if needed
        return view('dashboard');
    }
}
