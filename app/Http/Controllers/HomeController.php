<?php

namespace App\Http\Controllers;

use App\ScheduleContent;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $content = ScheduleContent::where('status', '=', 'published')->get();

        return view('home', compact('content'));
    }

    public function show($id)
    {
        $content = ScheduleContent::findOrFail($id);

        return view('show', compact('content'));
    }
}
