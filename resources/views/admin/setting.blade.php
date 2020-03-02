@extends('layouts.app')

@section('css')
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
@endsection

@section('nav-item')
<li class="nav-item"><a class="nav-link" href="{{ route('admin.home') }}">Home</a></li>
<li class="nav-item"><a class="nav-link" href="{{ route('admin.barcode') }}">Barcode</a></li>
<li class="nav-item active"><a class="nav-link active" href="{{ route('admin.setting') }}">Setting</a></li>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
            @endif
            @if(count($errors) > 0)
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                {{ $error }} <br/>
                @endforeach
            </div>
            @endif
            <div class="card">
                <div class="card-header">Setting</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.setting.store') }}">
                        @csrf

                        @foreach($events as $event)
                            <div class="form-group row">
                                <label for="events[]" class="col-sm-10 col-form-label">{{ $event->name }}</label>

                                <div class="col-sm-2">
                                    <input name="events[]" value="{{ $event->id }}" type="checkbox" data-toggle="toggle" data-onstyle="success" {{ $event->active ? "checked" : "" }}>
                                </div>
                            </div>
                        @endforeach
                        <hr/>
                        <div class="form-group row mb-0">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
@endsection