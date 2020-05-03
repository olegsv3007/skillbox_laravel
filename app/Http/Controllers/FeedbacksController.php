<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Feedback;

class FeedbacksController extends Controller
{
    public static function index()
    {
        $feedbacks = Feedback::latest()->get();

        return view("admin.feedbacks.index", compact('feedbacks'));
    }

    public static function store(Request $request)
    {
        $validateData = $request->validate([
            'email' => 'required|email',
            'message' => 'required',
        ]);

        Feedback::create(request()->all());

        return redirect('/contacts');
    }
}
