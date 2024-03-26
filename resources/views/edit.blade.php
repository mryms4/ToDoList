@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">To Do List</div>

                <div class="card-body">
                    <h4>Edit Form</h4>
                    <form method="POST" action="{{'update' , $todo->id}}">
                      @csrf
                      @method('PUT')
                      <input type="hidden" name="todo_id" value="{{$todo->id}}">
                        <div class="mb-3">
                          <label class="form-label">Title</label>
                          <input type="text" name="title" class="form-control" value="{{$todo->title}}">
                        <div class="mb-3">
                          <label class="form-label">Description</label>
                          <textarea name="description" class="form-control" cols="5" rows="5"  >
                            {{$todo->description}}
                          </textarea>
                        </div>
                        <div class="mb-3">
                          <label >Status</label>
                          <select name="compelete" class="form-control">
                            <option disabled selected>Select Option</option>
                            <option value="1">Compeleted</option>
                            <option value="0">In Compeleted</option>
                          </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection