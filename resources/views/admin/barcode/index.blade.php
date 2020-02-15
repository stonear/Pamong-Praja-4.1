@extends('layouts.app')

@section('css')
@endsection

@section('nav-item')
<li class="nav-item"><a class="nav-link" href="{{ route('admin.home') }}">Home</a></li>
<li class="nav-item active"><a class="nav-link active" href="{{ route('admin.barcode') }}">Barcode</a></li>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        	<h5 class="pt-5">Masukkan hasil scan barcode pada form di bawah ini</h5>

			<div class="form-group">
            	<input type="text" class="form-control" name="UID" id="UID" autofocus autocomplete="off">
			</div>

            <hr/>

            <div class="form-group">
            	<textarea class="form-control" rows="17" id="users" disabled></textarea>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
	$(document).ready(function() {
		$("#UID").on("change paste keyup", function() {
			var id = $(this).val();
			if (id.length >= 1)
			{
				$.get("{{ route('admin.barcode.search') }}" + '/' + id, function(data) {
					$("#users").html(data);
				});
			}
			else $("#users").html("");
		});
	});
</script>
@endsection