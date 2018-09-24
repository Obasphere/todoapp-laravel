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
            <th>Actions</th>
        </tr>
        @foreach($todos as $todo)
            <tr>
                <td>{{ $todo->todo }}</td>
                <td>
                    <a href="{{ route('todo.delete', ['id' => $todo->id]) }}" class="btn btn-danger btn-xs"> x </a> |
                    <a href="{{ route('todo.update', ['id' => $todo->id]) }}" class="btn btn-info btn-xs"> Update </a> |
                    @if(!$todo->completed)
                    <a href="{{ route('todos.completed', [ 'id' => $todo->id ]) }}" class="btn btn-xs btn-success"> Mark as Done </a>
                    @else
                    <span class="text-success">Done!</span>
                    @endif
                </td>
            </tr>
        @endforeach
    </table>

@stop
