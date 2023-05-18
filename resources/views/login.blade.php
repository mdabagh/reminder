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
    <form method="POST" action="{{ route('login') }}" class="w-50 p-4 bg-light rounded shadow-lg flex-column">
        @csrf

        <h2 class="mb-4">{{ __('auth.login') }}</h2>

        <div class="mb-3">
            <label for="email" class="form-label">{{ __('auth.email') }}</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" required autofocus>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">{{ __('auth.password') }}</label>
            <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
        </div>

        <div class="d-flex justify-content-between align-items-center">
            <button type="submit" class="btn btn-primary">{{ __('auth.login') }}</button>
            <a href="{{ route('register') }}" class="btn btn-secondary">{{ __('auth.register') }}</a>
        </div>
    </form>
</div>
@endsection