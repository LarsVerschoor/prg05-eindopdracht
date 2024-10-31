<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request) {
        if ($request->user()->role === 0) {
            abort(403);
        }
        return view('admin.index');
    }
}
