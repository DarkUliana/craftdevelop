<div class="col-sm-10 col-sm-offset-1">
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
                            {!! Form::label('title', 'title*', array('class'=>'control-label')) !!}
                            {!! Form::text('translations['.$language->code.'][title]', old('title',
                            isset($paper)?$paper->translate($language->code)->title:''),
                            array('class'=>'form-control')) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('text_preview', 'text preview',
                            array('class'=>'control-label')) !!}
                            {!! Form::textarea('translations['.$language->code.'][text_preview]', old('text_preview',
                            isset($paper)?$paper->translate($language->code)->text_preview:''),
                            array('class'=>'form-control')) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('text', 'text',
                            array('class'=>'control-label')) !!}
                            {!! Form::textarea('translations['.$language->code.'][text]', old('text',
                            isset($paper)?$paper->translate($language->code)->text:''),
                            array('class'=>'form-control ckeditor')) !!}
                        </div>
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<div class="col-sm-10 col-sm-offset-1">
    <div class="panel panel-success" style="border-radius: 5px !important; border: solid 3px #d6e9c6;">
        <div class="panel-body">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-12">
                        <label class="control-label">Головне зображення:</label>
                        <br/>
                        <div id="mainImage">
                            @isset($paper)
                                <img src="{{ asset('/img/blog/' . $paper->image) }}"
                                     class="img-thumbnail" style="max-width: 400px; margin: 10px">
                                <img src="{{ asset('/img/blog/previews/'. $paper->image) }}"
                                     class="img-thumbnail" style="max-width: 400px; margin: 10px">
                            @endisset
                        </div>
                        <input id="load_button" type="file" name="pictures[main_picture]" accept="image/*" class="file"
                               onchange="loadFile(event)">
                        <div id="borders" class="display-none" style="font-weight: bold; margin-top: 20px">Виберіть межі
                            для прев'ю:
                        </div>
                        <div class="col-md-12" id="add-crop">
                            <input id="delselect" type="button" value="&#215; Видалити прев'ю"
                                   style=" display: none; background-color:#f8f8f8;margin-top: 10px; border-top-left-radius: 10px; border-top-right-radius: 10px; outline: none"
                                   required>
                            <input type="hidden" id="x" name="pictures[x]"/>
                            <input type="hidden" id="y" name="pictures[y]"/>
                            <input type="hidden" id="w" name="pictures[w]"/>
                            <input type="hidden" id="h" name="pictures[h]"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="panel panel-success" style="border-radius: 5px !important; border: solid 3px #d6e9c6;">
        <div class="panel-body">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::label('album', 'Album images*', array('class'=>'control-label')) !!}
                        <input id="album" type="file" name="pictures[album][]" accept="image/*"
                               onchange="albumPreview(this);"
                               class="file" multiple>
                    </div>
                    <div class="col-md-12" id="albumImages">
                        @isset($paper)
                            @foreach($paper->albumImages as $image)
                                <img class="img-thumbnail" style="max-height: 100px"
                                     src="{{ asset('img/blog/albums/' . $image->image) }}">
                            @endforeach
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('tag_id', 'tag*', array('class'=>'control-label')) !!}

        {!! Form::select('tag_id', $tag, old('tag_id',
        isset($paper)?$paper->tag_id:1),
        array('class'=>'form-control')) !!}

    </div>
    <div class="form-group">
        {!! Form::label('date', 'date', array('class'=>'control-label')) !!}

        {!! Form::text('date', old('date',
        isset($paper)?$paper->date:date(config('quickadmin.date_format'))),
        array('class'=>'form-control datepicker')) !!}

    </div>
    <div class="form-group">
        {!! Form::label('views', 'number of views', array('class'=>'control-label')) !!}

        {!! Form::text('views', old('views',
        isset($paper)?$paper->views:0),
        array('class'=>'form-control')) !!}

    </div>

    <div class="form-group">

        {!! Form::submit( trans($button) , array('class' => 'btn btn-primary')) !!}

    </div>
</div>

