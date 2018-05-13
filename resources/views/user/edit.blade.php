@extends('layouts.master')

@section('content')
    <div class="row">
        
        @include('partials.sidenav')

        <div class="col-sm-8">
        <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Kullanıcı Düzenle</h3>
                </div>
                <div class="panel-body">
                    @include('partials.error')    
                
                    <form action="{{ route('user.update',$user->id) }}" method="POST">
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Kullanıcı Adı</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Kullanıcı Adı" value="{{$user->name}}">
                        </div>
                        <div class="form-group">
                            <label for="email">Kullanıcı E-mail</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Kullanıcı E-mail"  value="{{$user->email}}">
                        </div>
                        <div class="form-group">
                            <label for="password">Kullanıcı Parolası</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Kullanıcı Parolası">
                        </div>
                        <input type="hidden" name="id" value="{{$user->id}}">
                        <button type="submit" class="btn btn-default">Güncelle</button>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection