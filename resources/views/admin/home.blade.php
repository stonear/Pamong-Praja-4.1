@extends('layouts.app')

@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/b-1.6.1/datatables.min.css"/>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0/css/all.min.css" rel="stylesheet">
@endsection

@section('nav-item')
<li class="nav-item active"><a class="nav-link active" href="{{ route('admin.home') }}">Home</a></li>
<li class="nav-item"><a class="nav-link" href="{{ route('admin.barcode') }}">Barcode</a></li>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
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
            <div class="card mb-3">
                <div class="card-body">
                    <table class="table mb-0">
                        <tbody>
                            <tr>
                                <td>Registered</td>
                                <td>: {{ $registered }}</td>
                            </tr>
                            <tr>
                                <td>Unconfirmed</td>
                                <td>: {{ $unconfirmed }}</td>
                            </tr>
                            <tr>
                                <td>Confirmed</td>
                                <td>: {{ $confirmed }}</td>
                            </tr>
                            <tr>
                                <td>Rejected</td>
                                <td>: {{ $rejected }}</td>
                            </tr>
                            <tr>
                                <td>Total</td>
                                <td>: {{ $registered + $unconfirmed + $confirmed + $rejected }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card">
                <div class="card-header">List Peserta</div>
                <div class="card-body">
                    {{$dataTable->table(['class' => 'table table-bordered'], true)}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/b-1.6.1/datatables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0/js/all.min.js"></script>
<script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
{{$dataTable->scripts()}}
@endsection