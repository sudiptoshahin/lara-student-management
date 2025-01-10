<?php

namespace App\Http\Controllers;

use App\Http\Resources\StudentResource;
use App\Models\Student;
use Illuminate\Http\Request;
use Inertia\Inertia;

class StudentController extends Controller
{
    
    
    public function index() {

        $students = StudentResource::collection(Student::all());

        // return inertia('Students/Index');
        return Inertia::render('Students/Index', [
            // Other data...
            'component' => 'Students/Index'
        ]);
    }
}
