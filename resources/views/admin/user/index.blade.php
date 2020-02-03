@extends('layouts.app')

@section('css')
@endsection

@section('content')
<div class="container">
	<div class="row justify-content-center mb-4">
		<div class="col-md-3">
			<a href="{{ route('admin.home') }}" class="btn btn-primary btn-block mb-3">Back</a>
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
				<div class="card-header">Status</div>
				<div class="card-body">
					{{ $user->status }}
				</div>
			</div>
			<div class="card mb-3">
				<div class="card-header">Action</div>
				<div class="card-body">
					@if($user->status != 'confirmed')
					<a href="{{ route('admin.user.verify', ['id' => $user->id]) }}" class="btn btn-success btn-block mb-3">Verify</a>
					@else
					<a href="{{ route('admin.user.ticket', ['id' => $user->id]) }}" class="btn btn-success btn-block mb-3">Get Ticket</a>
					@endif
					<hr/>
					<form method="POST" action="{{ route('admin.user.password', ['id' => $user->id]) }}">
						@csrf
						<div class="form-group">
							<input id="password" type="password" class="form-control" name="password" required placeholder="Password">
						</div>
						<button type="submit" class="btn btn-danger btn-block">Change Password</button>
					</form>
				</div>
			</div>
		</div>
		<div class="col-md-9">
			@if($user->payment_proof)
			<div class="card mb-3">
				<div class="card-body">
					<figure class="figure text-center">
						<img src="{{ URL::to('/') }}/images/{{ $user->payment_proof }}" class="figure-img img-fluid rounded" alt="payment_proof">
						<figcaption class="figure-caption text-right">Bukti Pembayaran</figcaption>
					</figure>
				</div>
			</div>
			@endif
			<div class="card">
				<div class="card-header">Data Diri</div>
				<div class="card-body">
					<div class="form-group row">
						<label for="id" class="col-md-4 col-form-label text-md-right">ID</label>

						<div class="col-md-6">
							<input id="id" type="text" class="form-control" name="id" value="{{ $user->UID }}" disabled autofocus>
						</div>
					</div>

					<div class="form-group row">
						<label for="name" class="col-md-4 col-form-label text-md-right">Nama</label>

						<div class="col-md-6">
							<input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" disabled autofocus>
						</div>
					</div>

					<div class="form-group row">
						<label for="email" class="col-md-4 col-form-label text-md-right">E-mail</label>

						<div class="col-md-6">
							<input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" disabled>
						</div>
					</div>

					<hr/>

					<div class="form-group row">
						<label for="sex" class="col-md-4 col-form-label text-md-right">Jenis Kelamin</label>

						<div class="col-md-6">
							<input id="sex" type="sex" class="form-control" name="sex" value="{{ $user->sex == 'L' ? 'Laki-laki' : 'Perempuan' }}" disabled>
						</div>
					</div>

					<div class="form-group row">
						<label for="nationality" class="col-md-4 col-form-label text-md-right">Kewarganegaraan</label>


						<div class="col-md-6">
							<input id="nationality" type="text" class="form-control" name="nationality" value="{{ $user->nationality }}" disabled>
						</div>
					</div>

					<div class="form-group row">
						<label for="id_type" class="col-md-4 col-form-label text-md-right">Jenis Identitas Diri</label>

						<div class="col-md-6">
							<input id="id_type" type="text" class="form-control" name="id_type" value="{{ $user->id_type }}" disabled>
						</div>
					</div>

					<div class="form-group row">
						<label for="id_number" class="col-md-4 col-form-label text-md-right">Nomor Identitas Diri</label>

						<div class="col-md-6">
							<input id="id_number" type="text" class="form-control" name="id_number" value="{{ $user->id_number }}" disabled>
						</div>
					</div>

					<div class="form-group row">
						<label for="date_of_birth" class="col-md-4 col-form-label text-md-right">Tanggal Lahir</label>

						<div class="col-md-6">
							<input id="date_of_birth" type="text" class="form-control" name="date_of_birth" value="{{ $user->date_of_birth }}" disabled>
						</div>
					</div>

					<div class="form-group row">
						<label for="phone" class="col-md-4 col-form-label text-md-right">Nomor Telepon</label>

						<div class="col-md-6">
							<input id="phone" type="number" class="form-control" name="phone" value="{{ $user->phone }}" disabled>
						</div>
					</div>

					<div class="form-group row">
						<label for="community_type" class="col-md-4 col-form-label text-md-right">Jenis Instansi</label>

						<div class="col-md-6">
							<input id="community_type" type="text" class="form-control" name="community_type" value="{{ $user->community_type }}" disabled>
						</div>
					</div>

					<div class="form-group row">
						<label for="community_name" class="col-md-4 col-form-label text-md-right">Nama Instansi</label>

						<div class="col-md-6">
							<input id="community_name" type="text" class="form-control" name="community_name" value="{{ $user->community_name }}" disabled>
						</div>
					</div>

					<hr/>

					<div class="row">
						<div class="col-md-4 text-md-right">Acara yang Diikuti</div>

						<div class="col-md-6">
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="checkbox" id="forum" name="forum" value="true" {{ $user->forum ? 'checked' : '' }} disabled>
								<label class="form-check-label" for="forum">Seminar</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="checkbox" id="reunion" name="reunion" value="true" {{ $user->reunion ? 'checked' : '' }} disabled>
								<label class="form-check-label" for="reunion">Reuni</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="checkbox" id="run" name="run" value="true" {{ $user->run ? 'checked' : '' }} disabled>
								<label class="form-check-label" for="run">Fun Run</label>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('js')
@endsection