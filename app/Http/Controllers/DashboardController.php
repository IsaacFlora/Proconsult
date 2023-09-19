<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Post;
use App\Page;

class DashboardController extends Controller
{
    public function index()
    {
    	
        $title = 'Dashboard';

        return view('cms.dashboard', compact('title'));
    }

}
