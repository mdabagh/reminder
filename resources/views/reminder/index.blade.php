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
            <div class="p-3"> <h5 class="card-title">Reminder Status</h5> <ul class="list-unstyled"> <li><span class="badge bg-dark">Overdue:</span> Reminder is past due and doesn't repeat yearly.</li> <li><span class="badge bg-secondary">Upcoming:</span> Reminder is upcoming and either repeats yearly or is within the next year.</li> <li><span class="badge bg-success">Due soon:</span> Reminder is due within the next 30 days.</li> </ul> </div>
            @foreach($reminders as $reminder)
            @php
                $colorClass = '';
                $today = \Carbon\Carbon::today();
                $nextYear = \Carbon\Carbon::today()->addYear();
                $dueDate = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $reminder->date . ' ' . $reminder->time);
                $diffInDays = $today->diffInDays($dueDate, false);
                if ($reminder->repeat_yearly && $dueDate->lessThan($today)) {
                    $dueDate = $dueDate->addYear();
                }
                if ($reminder->repeat_yearly && $dueDate->greaterThan($nextYear)) {
                    $colorClass = 'bg-secondary text-white';
                } elseif ($diffInDays < 0 && !$reminder->repeat_yearly) {
                    $colorClass = 'bg-dark text-white';
                } elseif ($diffInDays < 0 && $reminder->repeat_yearly) {
                    $colorClass = 'bg-secondary text-white';
                } elseif ($diffInDays >= 0 && $diffInDays < 30) {
                    $colorClass = 'bg-success text-white';
                }
            @endphp
            <div class="col-md-4 mb-4">
                <div class="card {{ $colorClass }}">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div>
                            <h5 class="card-title">{{ $reminder->title }}</h5>
                            <p class="card-text mb-1">
                                <strong>Date: </strong>
                                @if ($reminder->repeat_yearly)
                                    Every year on {{ substr($reminder->date, 5) }}
                                @else
                                    {{ $reminder->date }}
                                @endif
                            </p>
                            <p class="card-text mb-1"><strong>Time: </strong>{{ $reminder->time }}</p>
                            <p class="card-text mb-3"><strong>Category: </strong><span class="">{{ $reminder->category->parent ? $reminder->category->parent->name_en . ' > ' : '' }}{{ $reminder->category->name_en }}</span></p>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('reminder.edit', $reminder->id) }}" class="btn btn-icon btn-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                  </svg>
                            </a>
                            <form action="{{ route('reminder.destroy', $reminder->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-icon btn-danger">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 0 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47Z"/>
                                      </svg>
                                </button>
                            </form>
                        </div>
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
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <div class="col-md-6">
                    <label for="category_id" class="form-label">Category</label>
                    <select id="category_id" class="form-select" name="category_id" required>
                        <option selected disabled>Choose...</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->parent ? $category->parent->name_en . ' > ' : '' }}{{ $category->name_en }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="date" class="form-label">Date</label>
                    <input type="date" class="form-control" id="date" name="date" required>
                </div>
                <div class="col-md-6">
                    <label for="time" class="form-label">Time</label>
                    <input type="time" class="form-control" id="time" name="time" required>
                </div>
                <div class="col-md-6">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="repeat_yearly" name="repeat_yearly" value="1">
                        <label class="form-check-label" for="repeat_yearly">
                            Repeat yearly
                        </label>
                    </div>
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
