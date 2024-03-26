@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                   
                    <a href="{{url()->previous()}}" class="btn btn-sm btm-info">Go Back</a><br>
                    <b>your To Do title is:</b>{{$todo->title}}
                    <b>your To Do description is:</b>{{$todo->description}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
