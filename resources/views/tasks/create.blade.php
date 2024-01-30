@extends('layouts.master')

@section('pageTitle', $pageTitle)
@section('main')
    <div class="form-container">
        <h1 class="form-title">{{ $pageTitle }}</h1>
        <form action="{{ route('tasks.store') }}" method="POST" class="form">
            @csrf
            <div class="form-item">
                <label>Name:</label>
                <input name="taskname" class="form-input" type="text" value="{{ old('taskname') }}">
                @error('taskname')
                    <div style="color: red; font-size: 16px;">
                        <p style="margin: 0">{{ $message }}</p>
                    </div>
                @enderror
            </div>
            <div class="form-item">
                <label>Detail:</label>
                <textarea name="taskdetail" class="form-text-area">{{ old('taskdetail') }}</textarea>
                @error('taskdetail')
                    <div style="color: red; font-size: 16px;">
                        <p style="margin: 0">{{ $message }}</p>
                    </div>
                @enderror
            </div>
            <div class="form-item">
                <label>Due Date:</label>
                <input name="taskduedate" class="form-input" type="date" value="{{ old('taskduedate') }}">
                @error('taskduedate')
                    <div style="color: red; font-size: 16px;">
                        <p style="margin: 0">{{ $message }}</p>
                    </div>
                @enderror
            </div>
            <div class="form-item">
                <label>Progress:</label>
                <select name="taskprogress" class="form-input">
                    <option value="not_started" selected>Not Started</option>
                    <option value="in_progress">In Progress</option>
                    <option value="in_review">Waiting/In Review</option>
                    <option value="completed">Completed</option>
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
