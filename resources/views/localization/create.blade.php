@extends('layouts.master')

@section('content')
    <div class="row">
        
        @include('partials.sidenav')

        <div class="col-sm-8">
        <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ $project->name }} Projesi Yereleştirmesi</h3>
                </div>
                <div class="panel-body">
                    @include('partials.error')
                    
                    <form action="{{ route('project.localization.store') }}" method="POST">
                        <div class="form-group">
                            <label for="name">Ülkeler</label>
                            <select class="form-control" name="language" id="language">
                                @foreach ($languages as $language)
                                    @if ($language->id == $langId)
                                        <option value="{{ $language->id }}" selected>{{ $language->name }}</option>
                                    @elseif ($langId>0)
                                        <option value="{{ $language->id }}" disabled>{{ $language->name }}</option>
                                    @else
                                        <option value="{{ $language->id }}">{{ $language->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            
                        </div>
                        <div class="form-group">
                            <label for="version">Version (Tam Sayı Girişi Yapınız)</label>
                            <input type="number" min="1" class="form-control" name="version" id="version" placeholder="Version">
                        </div>
                        <div class="form-inline">
                            <div class="form-group form">
                                <label for="version">Çeviri için kelime ekle</label>&nbsp;
                                <button type="button" class="btn btn-success" id="addNewWord">Yeni Kelime Ekle</button>
                            </div>
                        </div>
                        <br>
                        <table class="table table-bordered">
                            <thead>
                                <th>Kodu</th>
                                <th>Kelime</th>
                                <th></th>
                            </thead>
                            <tbody id="vocabulary">
                                @if($vocabularies!=null)
                                    @foreach ($vocabularies as $vocabulary)
                                    <tr>
                                        <td><input type="text" class="form-control" name="keys[]" maxlength="20" placeholder="Key" value="{{$vocabulary->key}}"></td>
                                        <td><input type="text" class="form-control" name="values[]" maxlength="50" placeholder="Value" value="{{$vocabulary->value}}"></td>
                                        <td><button type="button" class="delete btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button></td>
                                    </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>

                        <input type="hidden" name="projectid" value="{{ $project->id }}">
                        <input type="hidden" name="langid" value="{{ $langId }}">
                        <button type="submit" class="btn btn-default">Kaydet</button>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="application/javascript" src="{{ URL::to('src/js/app.js') }}"></script>
@endsection