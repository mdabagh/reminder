@extends('layout.master')

@section('content')
@if(session('success'))
<div class="alert alert-success mt-2">
    {{ session('success') }}
</div>
@endif

@if($errors->any())
    <div class="alert alert-danger mt-2">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="p-5 mb-4 bg-body-tertiary rounded-3">
    <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">Reminder List</h1>
        @if(count($reminders) > 0)
        <div class="row">
            @foreach($reminders as $reminder)
            <div class="col-md-4 mb-4">
                <div class="card {{ $reminder->is_past_due() ? 'bg-dark text-white' : 'text-dark' }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $reminder->title }}</h5>
                        <p class="card-text mb-1"><strong>Date: </strong>{{ $reminder->date }}</p>
                        <p class="card-text mb-1"><strong>Time: </strong>{{ $reminder->time }}</p>
                        <p class="card-text mb-3"><strong>Category: </strong><span class="">{{ $reminder->category->parent ? $reminder->category->parent->name_en . ' > ' : '' }}{{ $reminder->category->name_en }}</span></p>
                        <a href="{{ route('reminder.edit', $reminder->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('reminder.destroy', $reminder->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="alert alert-primary" role="alert">
            No reminders found.
        </div>
        @endif
    </div>
</div>

<div class="row align-items-md-stretch">
    <div class="col-md-6">
        <div class="h-100 p-5 text-bg-dark rounded-3">
            <h2>Create Reminder</h2>
            <form class="row g-3" method="POST" action="{{ route('reminder.store') }}">
                @csrf
                <div class="col-md-6">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title">
                </div>
                <div class="col-md-6">
                    <label for="category_id" class="form-label">Category</label>
                    <select id="category_id" class="form-select" name="category_id">
                        <option selected>Choose...</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->parent ? $category->parent->name_en . ' > ' : '' }}{{ $category->name_en }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="date" class="form-label">Date</label>
                    <input type="date" class="form-control" id="date" name="date">
                </div>
                <div class="col-md-6">
                    <label for="time" class="form-label">Time</label>
                    <input type="time" class="form-control" id="time" name="time">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-6">
        <div class="h-100 p-5 bg-body-tertiary border rounded-3">
            <h2>Create category</h2>
            <form method="POST" action="{{ route('categories.store') }}">
                @csrf
            
                <div class="form-group">
                    <label for="name_en">Title Category (English)</label>
                    <input type="text" class="form-control" name="name_en" id="name_en">
                </div>
            
                <div class="form-group">
                    <label for="name_fa">Title Category (Persian)</label>
                    <input type="text" class="form-control" name="name_fa" id="name_fa">
                </div>
            
                <div class="form-group">
                    <label for="id_parent">Main Category</label>
                    <select name="id_parent" id="id_parent" class="form-control">
                        <option value="">No Parent</option>
                        @foreach($categoriesMine as $categoryMine)
                            <option value="{{ $categoryMine->id }}">{{ $categoryMine->name_en }}</option>
                        @endforeach
                    </select>
                </div>
            
                <button type="submit" class="btn btn-primary mt-2">Save</button>
            </form>
          
        </div>
    </div>
</div>

@endsection
