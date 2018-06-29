@extends('admin.layouts.master')

@section('content')

    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
            <h1>{{ trans('quickadmin::templates.templates-view_create-add_new') }}</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        {!! implode('', $errors->all('<li class="error">:message</li>')) !!}
                    </ul>
                </div>
            @endif
        </div>
    </div>

    {!! Form::open(array('route' => config('quickadmin.route').'.key.store', 'id' => 'form-with-validation')) !!}
    <div class="col-sm-10 col-sm-offset-1">
    <div class="form-group">
        {!! Form::label('key', 'key*', array('class'=>'control-label')) !!}

        {!! Form::text('key', old('key'), array('class'=>'form-control')) !!}

    </div>

    <div class="panel panel-success" style="border-radius: 5px !important; border: solid 3px #d6e9c6;">
        <div class="panel-heading">Translations</div>
        <div class="panel-body">
            <ul class="nav nav-tabs">
                @foreach($languages as $language)
                    <li class="@if($loop->first){{ 'active' }}@endif"><a data-toggle="tab"
                                                                         href="#panel{{ $loop->iteration }}">{{ $language->code }}</a>
                    </li>
                @endforeach
            </ul>

            <div class="tab-content">
                @foreach($languages as $language)
                    <div id="panel{{ $loop->iteration }}"
                         class="tab-pane @if($loop->first){{ 'fade in active' }}@endif">
                        <h3>{{ $language->name }}</h3>
                        <p>
                        <div class="form-group">
                            {!! Form::label('name', 'name*', array('class'=>'control-label')) !!}
                            {!! Form::text('translations['.$language->code.'][name]', old('name',
                            isset($key)?$key->translate($language->code)->name:''),
                            array('class'=>'form-control')) !!}
                        </div>
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="form-group">

        {!! Form::submit( trans('quickadmin::templates.templates-view_create-create') , array('class' => 'btn btn-primary')) !!}

    </div>
    </div>
    {!! Form::close() !!}

@endsection