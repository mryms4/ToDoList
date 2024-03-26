<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\TodoRequest;
use App\Models\Todo;
use Illuminate\Http\Request;

class todoController extends Controller
{
public function todos(){
    $todos=Todo::all();
    return view('todos' , [
        'todos' => $todos
    ]);
}

public function create(){
    return view('create');
}

// public function edit(){
//     return view('edit');
// }

public function store(TodoRequest $request){
    Todo::create([
        'title' => $request->title,
        'description' => $request->description,
        'compelete'=>0,
    ]);

    $request->session()->flash('alert-success' , 'To Do created successfully!');

    return redirect('/todos');
}

public function show($id)
{
    $todo = Todo::findOrFail($id);

    return view('show', compact('todo'));
}


public function edit( $id)
{
    $todo = Todo::findOrFail($id);

    return view('edit', compact('todo'));

}



public function update(TodoRequest $request)
{
    $todo = Todo::findOrFail($request->todo_id);

    $todo->update([
        'title' => $request->title,
        'description' => $request->description,
        'complete' => $request->complete, 
    ]);
    
    $request->session()->flash('alert-info', 'To Do Updated successfully!'); 

    return redirect('/todos');
}


public function destroy(Request $request){
    $todo = Todo::find($request->todo_id);
    if(! $todo){
        request()->session()->flash('error' , 'Unable to locate the todo');
        return redirect('/todos')->withErrors([
            'error' => 'Unable to locate the todo'
        ]);
    }

    $todo->delete();
    $request->session()->flash('alert-success' , 'To Do Deleted successfully!');
    return redirect('/todos');
}

}
