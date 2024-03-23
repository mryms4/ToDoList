<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class todoController extends Controller
{
public function todos(){
    return view('todos');
}

public function create(){
    return view('create');
}
}
