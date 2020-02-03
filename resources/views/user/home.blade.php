@extends('layouts.app')

@section('css')
@endsection

@section('content')
<div class="container">
	<div class="row justify-content-center mb-4">
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
			<div class="card">
				<div class="card-header">Halo, {{ Auth::user()->name }}!</div>
				<div class="card-body">
					@if(Auth::user()->status == 'registered')
					Untuk mendapatkan e-ticket, peserta diharuskan melakukan pembayaran biaya pendaftaran sebesar Rp.100.000,- ke rekening BNI a.n. Admin. Kemudian unggah bukti pendaftaran pada form di bawah ini.
					<div class="mt-2">
						<form method="POST" action="{{ route('user.payment') }}" enctype="multipart/form-data">
							@csrf
							<div class="form-row align-items-center">
								<div class="col-auto">
									<label class="sr-only" for="payment_proof">Name</label>
									<input type="file" class="form-control mb-2" id="payment_proof" name="payment_proof" accept="image/*">
								</div>
								<div class="col-auto">
									<button type="submit" class="btn btn-primary mb-2">Submit</button>
								</div>
							</div>
						</form>
					</div>
					Setelah dilakukan verifikasi oleh administrator, anda akan mendapatkan e-ticket untuk ditunjukkan pada saat acara.
					@elseif(Auth::user()->status == 'unconfirmed')
					Bukti pembayaran anda sedang diverifikasi oleh administrator. Apabila dalam 24 jam belum terverifikasi, mohon hubungi PIC: Admin (+6288888888888).
					<hr/>
					<figure class="figure text-center">
						<img src="{{ URL::to('/') }}/images/{{ Auth::user()->payment_proof }}" class="figure-img img-fluid rounded" alt="payment_proof">
						<figcaption class="figure-caption text-right">Bukti Pembayaran</figcaption>
					</figure>
					@elseif(Auth::user()->status == 'confirmed')
					Pembayaran anda telah diverifikasi oleh administrator.<br/>
					<a href="{{ route('user.ticket') }}" class="btn btn-success mt-2">Unduh Tiket</a>
					@endif
				</div>
			</div>
		</div>
	</div>
	<div class="row justify-content-center">
		<div class="col-md-10">
			<div class="card">
				<div class="card-header">Data Diri</div>
				<div class="card-body">
					<div class="form-group row">
						<label for="id" class="col-md-4 col-form-label text-md-right">ID</label>

						<div class="col-md-6">
							<input id="id" type="text" class="form-control" name="id" value="{{ Auth::user()->UID }}" disabled autofocus>
						</div>
					</div>

					<div class="form-group row">
						<label for="name" class="col-md-4 col-form-label text-md-right">Nama</label>

						<div class="col-md-6">
							<input id="name" type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" disabled autofocus>
						</div>
					</div>

					<div class="form-group row">
						<label for="email" class="col-md-4 col-form-label text-md-right">E-mail</label>

						<div class="col-md-6">
							<input id="email" type="email" class="form-control" name="email" value="{{ Auth::user()->email }}" disabled>
						</div>
					</div>

					<hr/>

					<div class="form-group row">
						<label for="sex" class="col-md-4 col-form-label text-md-right">Jenis Kelamin</label>

						<div class="col-md-6">
							<input id="sex" type="sex" class="form-control" name="sex" value="{{ Auth::user()->sex == 'L' ? 'Laki-laki' : 'Perempuan' }}" disabled>
						</div>
					</div>

					<div class="form-group row">
						<label for="nationality" class="col-md-4 col-form-label text-md-right">Kewarganegaraan</label>


						<div class="col-md-6">
							<input id="nationality" type="text" class="form-control" name="nationality" value="{{ Auth::user()->nationality }}" disabled>
						</div>
					</div>

					<div class="form-group row">
						<label for="id_type" class="col-md-4 col-form-label text-md-right">Jenis Identitas Diri</label>

						<div class="col-md-6">
							<input id="id_type" type="text" class="form-control" name="id_type" value="{{ Auth::user()->id_type }}" disabled>
						</div>
					</div>

					<div class="form-group row">
						<label for="id_number" class="col-md-4 col-form-label text-md-right">Nomor Identitas Diri</label>

						<div class="col-md-6">
							<input id="id_number" type="text" class="form-control" name="id_number" value="{{ Auth::user()->id_number }}" disabled>
						</div>
					</div>

					<div class="form-group row">
						<label for="date_of_birth" class="col-md-4 col-form-label text-md-right">Tanggal Lahir</label>

						<div class="col-md-6">
							<input id="date_of_birth" type="text" class="form-control" name="date_of_birth" value="{{ Auth::user()->date_of_birth }}" disabled>
						</div>
					</div>

					<div class="form-group row">
						<label for="phone" class="col-md-4 col-form-label text-md-right">Nomor Telepon</label>

						<div class="col-md-6">
							<input id="phone" type="number" class="form-control" name="phone" value="{{ Auth::user()->phone }}" disabled>
						</div>
					</div>

					<div class="form-group row">
						<label for="community_type" class="col-md-4 col-form-label text-md-right">Jenis Instansi</label>

						<div class="col-md-6">
							<input id="community_type" type="text" class="form-control" name="community_type" value="{{ Auth::user()->community_type }}" disabled>
						</div>
					</div>

					<div class="form-group row">
						<label for="community_name" class="col-md-4 col-form-label text-md-right">Nama Instansi</label>

						<div class="col-md-6">
							<input id="community_name" type="text" class="form-control" name="community_name" value="{{ Auth::user()->community_name }}" disabled>
						</div>
					</div>

					<hr/>

					<div class="row">
						<div class="col-md-4 text-md-right">Acara yang Diikuti</div>

						<div class="col-md-6">
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="checkbox" id="forum" name="forum" value="true" {{ Auth::user()->forum ? 'checked' : '' }} disabled>
								<label class="form-check-label" for="forum">Seminar</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="checkbox" id="reunion" name="reunion" value="true" {{ Auth::user()->reunion ? 'checked' : '' }} disabled>
								<label class="form-check-label" for="reunion">Reuni</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="checkbox" id="run" name="run" value="true" {{ Auth::user()->run ? 'checked' : '' }} disabled>
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