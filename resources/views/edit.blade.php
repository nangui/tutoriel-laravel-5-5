@extends('layouts.layout')

@section('content')

    <div class="col-md-8 col-md-offset-2">
        <form action="{{ route('todo.update', ['id' => $todo->id]) }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name" class="control-label col-md-2">Name</label>
                <input type="text" class="form-control col-md-10" id="name" name="name" value="{{ $todo->name }}">
            </div>
            <button type="submit" class="col-md-offset-2 btn btn-raised btn-success">Modifier</button>
        </form>
    </div>

@endsection