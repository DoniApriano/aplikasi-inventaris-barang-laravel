<?php

namespace App\Http\Controllers\owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OwnerController extends Controller
{
    public function index()
    {
        $name = Auth::user()->name;
        $role = Auth::user()->role->name;
        return view('page.dashboard',compact(['name','role']));
    }
}
