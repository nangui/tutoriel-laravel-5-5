@extends('layouts.layout')

@section('content')

    <div class="col-md-8 col-md-offset-2">
        <form action="{{ route('todo.save') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name" class="control-label col-md-2">Name</label>
                <input type="text" class="form-control col-md-10" id="name" name="name">
            </div>
            <button type="submit" class="col-md-offset-2 btn btn-raised btn-success">Ajouter</button>
        </form>
    </div>
    <div class="col-md-6 col-md-offset-3">
        <ul class="list-group">
            @foreach($todos as $todo)
            <li class="list-group-item">
                {{ $todo->name }} &nbsp;
                <a href="{{ route('todo.delete', ['id'=> $todo->id]) }}" class="btn btn-raised btn-sm btn-danger">supprimer</a>
                <a href="{{ route('todo.edit', ['id'=> $todo->id]) }}" class="btn btn-raised btn-sm btn-warning">editer</a>
            </li>
            @endforeach
        </ul>
        {{ $todos->links() }}
    </div>

@endsection