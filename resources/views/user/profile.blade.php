@extends('layouts.master')

@section('content')
    <div class="row">
        
        @include('partials.sidenav')

        <div class="col-sm-8">
            <h1>Hoş Geldin {{ Auth::user()->name }}</h1>
            <p>Yapmak istediğiniz işlemlere soldaki menüden erişebilirsiniz.</p>
        </div>
    </div>
@endsection