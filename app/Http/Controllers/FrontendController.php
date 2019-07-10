<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;


class FrontendController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('web', compact('categories', $categories));
    }
}
