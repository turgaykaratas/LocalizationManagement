@extends('layouts.master')

@section('content')
    <div class="row">
        
        @include('partials.sidenav')

        <div class="col-sm-8">
        <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Proje Ekle</h3>
                </div>
                <div class="panel-body">
                    @include('partials.error')
                    
                    <form action="{{ route('project.store') }}" method="POST">
                        <div class="form-group">
                            <label for="name">Proje Adı</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Proje Adı">
                        </div>
                        <button type="submit" class="btn btn-default">Kaydet</button>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection