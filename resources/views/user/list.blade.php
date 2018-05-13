@extends('layouts.master')

@section('content')
    <div class="row">
        
        @include('partials.sidenav')

        <div class="col-sm-8">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <span>Kullanıcı Listesi</span>
                        <a href="{{route('user.create')}}" style="padding:0px;" class="pull-right btn btn-link">Yeni Kullanıcı</a>  
                    </h3>  
                    
                </div>
                <div class="panel-body" style="padding:0px;">
                    <table class="table">
                        <thead>
                            <th>Id</th>
                            <th>İsim</th>
                            <th>E-mail</th>
                            <th>Kullanıcı Tipi</th>
                            <th></th>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    @foreach ($user->cachedRoles() as $cachedRole)
                                        {{ $cachedRole->display_name }}

                                        @if (!$loop->last)
                                            ,
                                        @endif

                                    @endforeach
                                </td>
                                <td><a href="{{route('user.edit',$user->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection