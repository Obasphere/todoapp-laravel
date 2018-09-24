@extends('layout')


@section('content')
    
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <form action="/create/todo" method="post">
                {{ csrf_field() }}
                <input type="text" class="form-control input-lg" name="todo" placeholder="Create a new todo">
            </form>
        </div>
    </div>

    <hr>

    <table class="table table-striped table-bordered">
        <tr>
            <th> Todos </th>
            <th></th>
            <th>Actions</th>
            <th></th>
        </tr>
        @foreach($todos as $todo)
            <tr>
                <td>{{ $todo->todo }}</td>
                <td><a href="{{ route('todo.delete', ['id' => $todo->id]) }}" class="btn btn-danger btn-xs"> x </a></td>
                <td><a href="{{ route('todo.update', ['id' => $todo->id]) }}" class="btn btn-info btn-xs"> Update </a></td>
                @if(!$todo->completed)
                    <td><a href="{{ route('todos.completed', [ 'id' => $todo->id ]) }}" class="btn btn-xs btn-success"> Mark as Done </a></td>
                
                @else
                    <td><span class="text-success">Done!</span></td>
                @endif
            </tr>
        @endforeach
    </table>

@stop
