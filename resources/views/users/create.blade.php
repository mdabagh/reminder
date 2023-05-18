@extends('layout.master')

@section('content')
@if($errors->any())
    <div class="alert alert-danger mt-2">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="d-flex justify-content-center align-items-center">

<form action="{{ route('register') }}" method="post" class="w-50 p-4 bg-light rounded shadow-lg flex-column">
    @csrf

    <h2 class="mb-4">{{ __('auth.register') }}</h2>

    <div class="mb-3">
        <label for="name" class="form-label">{{ __('auth.name') }}</label>
        <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" required>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">{{ __('auth.email') }}</label>
        <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" required>
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">{{ __('auth.password') }}</label>
        <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
    </div>

    <div class="mb-3">
        <label for="password-confirm" class="form-label">{{ __('auth.confirm_password') }}</label>
        <input type="password" id="password-confirm" name="password_confirmation" class="form-control" required>
    </div>

    <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-primary">{{ __('auth.register_button') }}</button>
    </div>
</form>

</div>
@endsection