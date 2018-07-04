@extends('admin.layouts.master')

@section('content')

    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <h1>Show</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        {!! implode('', $errors->all('<li class="error">:message</li>')) !!}
                    </ul>
                </div>
            @endif
            <table class="table table-responsive">
                <tr>
                    <th>Name</th>
                    <td>{{ $messages->name }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $messages->email }}</td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td>{{ $messages->message }}</td>
                </tr>
            </table>
        </div>
    </div>



@endsection