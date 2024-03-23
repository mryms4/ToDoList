<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\TodoRequest;
use Illuminate\Http\Request;

class todoController extends Controller
{
public function todos(){
    return view('todos');
}

public function create(){
    return view('create');
}

public function edit(){
    return view('edit');
}

public function store(TodoRequest $request){
    return $request->all();
}
}
