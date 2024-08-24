@extends('layouts.app')
@section("title") Login @endsection

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="mt-5">Login</h2>



            <form method="POST" action="{{route('login.login')}}">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" class="form-control" name="email" value="{{ old('email') }}" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" class="form-control" name="password" required>
                </div>
                <br>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6 offset-md-4">
                        <a href="{{ route('register.index') }}" class="btn btn-link">
                            {{ __('Dont have an account? Register') }}
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@endsection
