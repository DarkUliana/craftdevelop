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

    {!! Form::open(array('route' => config('quickadmin.route').'.papers.store', 'id' => 'form-with-validation')) !!}

    {{--<div class="col-sm-10 col-sm-offset-1">--}}
        {{--<ul class="nav nav-tabs">--}}
            {{--<li class="active"><a data-toggle="tab" href="#panel1">en</a></li>--}}
            {{--<li><a data-toggle="tab" href="#panel2">ru</a></li>--}}
        {{--</ul>--}}

        {{--<div class="tab-content">--}}
            {{--<div id="panel1" class="tab-pane fade in active">--}}
                {{--<h3>English</h3>--}}
                {{--<p>--}}
                {{--<div class="form-group">--}}
                    {{--{!! Form::label('title', 'title*') !!}--}}
                    {{--{!! Form::text('title', old('title'), array('class'=>'form-control')) !!}--}}


                {{--</div>--}}
                {{--<div class="form-group">--}}
                    {{--{!! Form::label('text_preview', 'text preview') !!}--}}
                    {{--{!! Form::textarea('text_preview', old('text_preview'), array('class'=>'form-control')) !!}--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                    {{--{!! Form::label('text', 'text') !!}--}}
                    {{--{!! Form::textarea('text', old('text'), array('class'=>'form-control ckeditor')) !!}--}}

                {{--</div>--}}
                {{--</p>--}}
            {{--</div>--}}
            {{--<div id="panel2" class="tab-pane fade">--}}
                {{--<h3>Русский</h3>--}}
                {{--<p>--}}
                {{--<div class="form-group">--}}
                    {{--{!! Form::label('title', 'title*') !!}--}}
                    {{--{!! Form::text('title', old('title'), array('class'=>'form-control')) !!}--}}

                {{--</div>--}}
                {{--<div class="form-group">--}}
                    {{--{!! Form::label('text_preview', 'text preview') !!}--}}
                    {{--{!! Form::textarea('text_preview', old('text_preview'), array('class'=>'form-control')) !!}--}}

                {{--</div>--}}
                {{--<div class="form-group">--}}
                    {{--{!! Form::label('text', 'text') !!}--}}
                    {{--{!! Form::textarea('text', old('text'), array('class'=>'form-control ckeditor')) !!}--}}

                {{--</div>--}}
                {{--</p>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--<div class="col-sm-10 col-sm-offset-1">--}}
    {{--<div class="form-group">--}}
        {{--{!! Form::label('tag_id', 'tag*') !!}--}}

            {{--{!! Form::select('tag_id', $tag, old('tag_id'), array('class'=>'form-control')) !!}--}}

    {{--</div>--}}
    {{--<div class="form-group">--}}
        {{--{!! Form::label('date', 'date') !!}--}}

            {{--{!! Form::text('date', old('date'), array('class'=>'form-control datepicker')) !!}--}}

    {{--</div>--}}
    {{--<div class="form-group">--}}
        {{--{!! Form::label('views', 'number of views') !!}--}}
            {{--{!! Form::text('views', old('views'), array('class'=>'form-control')) !!}--}}

    {{--</div>--}}

    {{--<div class="form-group">--}}
        {{--<div class="col-sm-10 col-sm-offset-1">--}}
            {{--{!! Form::submit( trans('quickadmin::templates.templates-view_create-create') , array('class' => 'btn btn-primary')) !!}--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}


    @include('admin.papers.form', ['button' => 'quickadmin::templates.templates-view_create-create'])
    {!! Form::close() !!}

@endsection