@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Todo</h1>

    <!-- Display validation errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('todos.update', $todo->id) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $todo->title) }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description">{{ old('description', $todo->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="Pending" {{ old('status', $todo->status) === 'Pending' ? 'selected' : '' }}>Pending</option>
                <option value="In Progress" {{ old('status', $todo->status) === 'In Progress' ? 'selected' : '' }}>In Progress</option>
                <option value="Completed" {{ old('status', $todo->status) === 'Completed' ? 'selected' : '' }}>Completed</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Todo</button>
        <a href="{{ route('todos.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
