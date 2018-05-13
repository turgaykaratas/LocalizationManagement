@extends('layouts.master')

@section('content')
    <div class="row">
        
        @include('partials.sidenav')

        <div class="col-sm-8">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <span>Proje Listesi</span>
                        <a href="{{route('project.create')}}" style="padding:0px;" class="pull-right btn btn-link">Yeni Proje</a>  
                    </h3>  
                    
                </div>
                <div class="panel-body" style="padding:0px;">
                    <table class="table">
                        <thead>
                            <th>Id</th>
                            <th>Proje Adı</th>
                            <th>Proje Sorumlusu</th>
                            <th></th>
                        </thead>
                        <tbody>
                            @if($projects)
                                @foreach($projects as $project)
                                    <tr>
                                        <td>{{$project->id}}</td>
                                        <td>{{$project->name}}</td>
                                        <td>{{$project->user->name}}</td>
                                        <td>Projeye Dil <a href="{{ route('project.localization', $project->id) }}" class="btn btn-primary btn-sm">Ekle</a></td>
                                    </tr>
                                    @if(count($project->languages)>0)
                                        <tr>
                                            <th></th>
                                            <th colspan="3">Proje Dilleri</th>
                                        </tr>
                                        @foreach($project->languages as $langu)
                                            <tr>
                                                <td></td>
                                                <td colspan="2">{{ $langu->name }} ( Dil Kodu : {{ $langu->code }} )</td>
                                                <td>Proje Diline Yeni Versiyon  <a href="{{ route('project.localization2', ['projectId'=>$project->id, 'langId'=>$langu->id]) }}" class="btn btn-primary btn-sm">Ekle</a></td>
                                            </tr>

                                            @if(count($project->verions)>0)
                                                @foreach($project->verions as $version)
                                                    @if($version->language_id == $langu->id)
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td><b>Proje dil versiyonu :</b>{{ $version->version }}</td>
                                                            <td>
                                                                Versiyonu Kullanarak Yeni Versiyon <a href="{{ route('project.localization3', ['projectId'=>$project->id, 'langId'=>$langu->id, 'versionId' => $version->id]) }}" class="btn btn-primary btn-sm">Ekle</a>
                                                                <a href="{{ route('project.vocabulary.list', $version->id) }}" class="btn btn-success btn-sm">Versiyon Kelimelerine Bak</a>
                                                            </td>
                                                        </tr>        
                                                    @endif    
                                                @endforeach
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                            @else
                            <tr><td colspan="4" style="text-align:center;font-weight:bold;">Gösterilecek Proje Yok Henüz</td></tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection