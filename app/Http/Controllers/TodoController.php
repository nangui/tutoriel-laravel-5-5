<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use Session;
use Auth;

class TodoController extends Controller
{
    // Retourne la page vue todo.blade.php
    public function index()
    {
        $todos = Auth::user()->todos()->orderBy('created_at', 'desc')->paginate(5);
        return view('todo')->with('todos', $todos);
    }

    public function save(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:5'
        ]);

        $todo = new Todo;
        $todo->name = $request->name;
        $todo->user_id = Auth::id();
        $todo->save();

        Session::flash('success', 'Todo ajouté avec succès');

        return redirect()->back();
    }

    public function edit($id)
    {   
        $todo = Todo::find($id);

        return view('edit')->with('todo', $todo);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|min:5'
        ]);

        $todo = Todo::find($id);
        $todo->name = $request->name;
        $todo->update();

        Session::flash('success', 'Todo modifié avec succès');

        return redirect()->route('todos');
    }

    public function delete($id)
    {
        $todo = Todo::find($id);
        $todo->delete();

        Session::flash('success', 'Todo supprimé avec succès');

        return redirect()->back();
    }
}
