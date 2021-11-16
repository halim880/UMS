<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PDFController extends Controller
{
    public function registrationForm() {
        $student = Auth::user()->student;
        $form = $student->submited_form();
        $current_courses = $student->current_courses();
        $pdf = PDF::loadView('student.form.pdf', compact(['student', 'form', 'current_courses']));
        return $pdf->download('pdf_file.pdf');
      }
}
