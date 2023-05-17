@extends('layout.master')

@section('content')
<div class="p-5 mb-4 bg-body-tertiary rounded-3">
    <div class="container py-5">
        <h1 class="display-5 fw-bold">Edit Reminder</h1>
        <form method="POST" action="{{ route('reminder.update', $reminder->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $reminder->title }}">
            </div>
            <div class="form-group">
                <label for="category_id">Category:</label>
                <select class="form-control" id="category_id" name="category_id">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $reminder->category_id == $category->id ? 'selected' : '' }}>{{ $category->name_en }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" class="form-control" id="date" name="date" value="{{ $reminder->date }}">
            </div>
            <div class="form-group">
                <label for="time">Time:</label>
                <input type="time" class="form-control" id="time" name="time" value="{{ $reminder->time }}">
            </div>
            <button type="submit" class="btn btn-primary">Update Reminder</button>
        </form>
    </div>
</div>
@endsection