@extends('layouts.master')

@section('pageTitle', $pageTitle)
@section('main')
    <div class="form-container">
        <h1 class="form-title">{{ $pageTitle }}</h1>
        <form class="form">
            <div class="form-item">
                <label>Name:</label>
                <input name="taskname" class="form-input" type="text" value="">
            </div>
            <div class="form-item">
                <label>Detail:</label>
                <textarea name="taskdetail" class="form-text-area"></textarea>
            </div>
            <div class="form-item">
                <label>Due Date:</label>
                <input name="taskduedate" class="form-input" type="date" value="">
            </div>
            <div class="form-item">
                <label>Progress:</label>
                <select name="taskprogress" class="form-input">
                    <option value="not_started">Not Started</option>
                    <option value="in_progress">In Progress</option>
                    <option value="in_review">Waiting/In Review</option>
                    <option value="completed">Completed</option>
                </select>
            </div>
            <button type="button" class="form-button">Submit</button>
        </form>
    </div>
@endsection
