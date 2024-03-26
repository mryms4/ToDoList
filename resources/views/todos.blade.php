@extends('layouts.app')

@section('styles')
<style>
    #outer
    {
        width: auto%;
        text-align: center;
    }   

    .inner{
        display: inline-block;
    }
</style>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">

                    @if(Session::has('alert-success'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('alert-success')}}
                    </div>
                    @endif

                    @if(Session::has('alert-info'))
                    <div class="alert alert-info" role="alert">
                        {{Session::get('alert-info')}}
                    </div>
                    @endif

                    <a href="{{'create'}}" class="btn btn-sm btn-info">Create To do</a>

                   <h4> Welcome to To Do List site!</h4><br>
                    @if(count($todos)>0)
                        <table class="table">
                            <thead>
                                <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Compeleted</th>
                                <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($todos as $todo)
                                <tr>
                                    <td>{{$todo->title}}</td>
                                    <td>{{$todo->description}}</td>
                                    <td>
                                        @if($todo->compelete == 1)
                                            <a href="" class="btn btn-sm btn-success">compeleted</a>
                                        @else
                                            <a href="" class="btn btn-sm btn-danger">in compeleted</a>
                                        @endif
                                    </td>
                                    <td id="outer">
                                        <a href="{{route('edit' , $todo->id)}}" class="inner btn btn-sm btn-info">Edit</a>
                                        <a href="{{'show' , $todo->id}}" class="inner btn btn-sm btn-success">View</a>
                                        <form method="POST" action="{{'destroy'}}" class="inner">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="todo_id" value="{{$todo->id}}">
                                            <input type="submit" class="btn btn-sm btn-danger" value="Delete">
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                    <h4>No To Do are created yet</h4> 
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection