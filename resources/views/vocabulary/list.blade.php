@extends('layouts.master')

@section('content')
    <div class="row">
        
        @include('partials.sidenav')

        <div class="col-sm-8">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <span>Proje : {{$vocabularies[0]->languageVersion->project->name}} - Dil : {{$vocabularies[0]->languageVersion->language->name}}  -  Versiyon : {{$vocabularies[0]->languageVersion->version}} Kelimeleri</span>
                    </h3>  
                    
                </div>
                <div class="panel-body" style="padding:0px;">
                    <table class="table">
                        <thead>
                            <th>Id</th>
                            <th>Key</th>
                            <th>Value</th>
                        </thead>
                        <tbody>
                            @if($vocabularies)
                            
                                @foreach($vocabularies as $vocabulary)
                                    <tr>
                                        <td>{{$vocabulary->id}}</td>
                                        <td>{{$vocabulary->key}}</td>
                                        <td>{{$vocabulary->value}}</td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection