@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h1>Giriş Yap</h1>

            @include('partials.error')

            <form action="{{ route('user.signin') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="email">E-posta</label>
                    <input type="text" id="email" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Parola</label>
                    <input type="password" id="password" name="password" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Giriş Yap</button>
            </form>
        </div>
    </div>
@endsection