<?php

namespace Todos\Http\Controllers;

use Todos\Todo;

use Illuminate\Http\Request;

class TodosController extends Controller
{
    public function index()
    {
        $todos = Todo::all()->sortByDesc('id');
        return view('todos')->with('todos', $todos);
    }

    public function store(Request $request)
    {
        $todo = new Todo;
        $todo->todo = $request->todo;
        $todo->save();

        return redirect()->back();
    }

    public function delete($id)
    {
        $todo = Todo::find($id);
        $todo->delete();
        return redirect()->back();
    }

    public function update($id)
    {
        $todo = Todo::find($id);
        return view('update')->with('todo', $todo);
    }

    public function save(Request $request, $id)
    {
        $todo = Todo::find($id);
        $todo->todo = $request->todo;
        $todo->save();
        return redirect()->route('todos');
    }

    public function completed($id)
    {
        $todo = Todo::find($id);
        $todo->completed = 1;
        $todo->save();
        return redirect()->back();
    }
}
