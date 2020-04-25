<?php

namespace App\Http\Controllers\panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('api');
    }

	public function index(Request $request)
	{
		return view('panel.home');
    }
}
