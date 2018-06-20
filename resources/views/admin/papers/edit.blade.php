@extends('admin.layouts.master')

@section('content')

    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
            <h1>{{ trans('quickadmin::templates.templates-view_edit-edit') }}</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        {!! implode('', $errors->all('<li class="error">:message</li>')) !!}
                    </ul>
                </div>
            @endif
        </div>
    </div>

    {!! Form::model($paper, array('id' => 'form-with-validation', 'method' => 'PATCH', 'enctype' => 'multipart/form-data', 'route' => array(config('quickadmin.route').'.papers.update', $paper->id))) !!}

        @include('admin.papers.form', ['button' => 'quickadmin::templates.templates-view_edit-update'])

    {!! Form::close() !!}

@endsection