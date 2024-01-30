@extends('layouts.master')

@section('pageTitle', $pageTitle)
@section('main')
    <div class="form-container">
        <h1 class="form-title">{{ $pageTitle }}</h1>
        <form action="{{ route('tasks.update', ['task' => $task->id]) }}" method="POST" class="form">
            @csrf
            @method('PUT')
            <div class="form-item">
                <label>Name:</label>
                <input name="taskname" class="form-input" type="text" value="{{ $task->name }}">
                @error('taskname')
                    <div style="color: red; font-size: 16px;">
                        <p style="margin: 0">{{ $message }}</p>
                    </div>
                @enderror
            </div>
            <div class="form-item">
                <label>Detail:</label>
                <textarea name="taskdetail" class="form-text-area">{{ $task->detail }}</textarea>
                @error('taskdetail')
                    <div style="color: red; font-size: 16px;">
                        <p style="margin: 0">{{ $message }}</p>
                    </div>
                @enderror
            </div>

            <div class="form-item">
                <label>Due Date:</label>
                <input name="taskduedate" class="form-input" type="date" value="{{ $task->due_date }}">
                @error('taskduedate')
                    <div style="color: red; font-size: 16px;">
                        <p style="margin: 0">{{ $message }}</p>
                    </div>
                @enderror
            </div>
            <div class="form-item">
                <label>Progress:</label>
                <select name="taskprogress" class="form-input">
                    <option @if ($task->status == 'not_started') selected @endif value="not_started">
                        Not Started
                    </option>
                    <option @if ($task->status == 'in_progress') selected @endif value="in_progress">
                        In Progress
                    </option>
                    <option @if ($task->status == 'in_review') selected @endif value="in_review">
                        Waiting/In Review
                    </option>
                    <option @if ($task->status == 'completed') selected @endif value="completed">
                        Completed
                    </option>
                </select>
                @error('taskprogress')
                    <div style="color: red; font-size: 16px;">
                        <p style="margin: 0">{{ $message }}</p>
                    </div>
                @enderror
            </div>
            <button type="submit" class="form-button">Submit</button>
        </form>
    </div>
@endsection
