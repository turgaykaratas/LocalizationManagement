@extends('layouts.master')

@section('content')
    <div class="row">
        
        @include('partials.sidenav')

        <div class="col-sm-8">
        <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Kullanıcı Ekle</h3>
                </div>
                <div class="panel-body">
                    @include('partials.error')
                    
                    <form action="{{ route('user.store') }}" method="POST">
                        <div class="form-group">
                            <label for="name">Kullanıcı Adı</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Kullanıcı Adı">
                        </div>
                        <div class="form-group">
                            <label for="email">Kullanıcı E-mail</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Kullanıcı E-mail">
                        </div>
                        <div class="form-group">
                            <label for="password">Kullanıcı Parolası</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Kullanıcı Parolası">
                        </div>
                        <button type="submit" class="btn btn-default">Kaydet</button>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection