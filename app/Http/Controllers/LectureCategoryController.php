<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LectureCategoryController extends Controller
{
    public function index() {
        return view('lecture_category.index');
    }
}
