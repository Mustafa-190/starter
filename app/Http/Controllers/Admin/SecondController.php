<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SecondController extends Controller
{
	public function __construct(){
		// Except('method') means all of them must be Auth excepting method
		$this->middleware('auth')->except('showString');
	}

    public function showString()
    {
    	return 'static string';
    }
}
