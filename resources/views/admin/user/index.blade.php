@if(empty($user))
@php die() @endphp
@endif

@extends('layouts.app')

@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet">
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
					<a href="{{ route('admin.user.reject', ['id' => $user->id]) }}" class="btn btn-danger btn-block mb-3">Reject</a>
					@else
					<a href="{{ route('admin.user.ticket', ['id' => $user->id]) }}" class="btn btn-success btn-block mb-3">Get Ticket</a>
					<a href="{{ route('admin.user.unverify', ['id' => $user->id]) }}" class="btn btn-danger btn-block mb-3">Unverify</a>
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
					<form method="POST" action="{{ route('admin.user.store', ['id' => $user->id]) }}">
						@csrf
						<div class="form-group row">
							<label for="event_id" class="col-md-4 col-form-label text-md-right">Kategori</label>
							<div class="col-md-6">
								<select class="form-control" id="event_id" name="event_id" required>
									@foreach($events as $e)
									<option value="{{ $e->id }}" {{ ($user->event_id == $e->id) ? 'selected' : '' }}>
										{{ $e->name . ' Rp. ' . number_format($e->price) . ',-' }}
									</option>
									@endforeach
								</select>
							</div>
						</div>

						<div class="form-group row">
							<label for="t_shirt" class="col-md-4 col-form-label text-md-right">Ukuran Baju<br>(Khusus Fun Run)</label>

							<div class="col-md-6">
								{{-- <input id="t_shirt" type="text" class="form-control" name="t_shirt" value="{{ $user->t_shirt }}" autofocus> --}}
								<select class="form-control" id="t_shirt" name="t_shirt" required>
	                                <option value="-" {{ ($user->t_shirt == '-') ? 'selected' : '' }}>-</option>
	                                <option value="XS" {{ ($user->t_shirt == 'XS') ? 'selected' : '' }}>XS</option>
	                                <option value="S" {{ ($user->t_shirt == 'S') ? 'selected' : '' }}>S</option>
	                                <option value="M" {{ ($user->t_shirt == 'M') ? 'selected' : '' }}>M</option>
	                                <option value="L" {{ ($user->t_shirt == 'L') ? 'selected' : '' }}>L</option>
	                                <option value="XL" {{ ($user->t_shirt == 'XL') ? 'selected' : '' }}>XL</option>
	                                <option value="XXL" {{ ($user->t_shirt == 'XXL') ? 'selected' : '' }}>XXL</option>
	                                <option value="3XL" {{ ($user->t_shirt == '3XL') ? 'selected' : '' }}>3XL</option>
	                            </select>
							</div>
						</div>

						<hr/>

						<div class="form-group row">
							<label for="id" class="col-md-4 col-form-label text-md-right">ID</label>

							<div class="col-md-6">
								<input id="id" type="text" class="form-control" name="id" value="{{ $user->UID }}" autofocus disabled>
							</div>
						</div>

						<div class="form-group row">
							<label for="name" class="col-md-4 col-form-label text-md-right">Nama</label>

							<div class="col-md-6">
								<input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" autofocus>
							</div>
						</div>

						<div class="form-group row">
							<label for="email" class="col-md-4 col-form-label text-md-right">E-mail</label>

							<div class="col-md-6">
								<input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}">
							</div>
						</div>

						<hr/>

						<div class="form-group row">
							<label for="sex" class="col-md-4 col-form-label text-md-right">Jenis Kelamin</label>

							<div class="col-md-6">
								<select class="form-control" id="sex" name="sex" required>
			                        <option value="L" {{ $user->sex == 'L' ? 'selected' : '' }}>Laki-laki</option>
			                        <option value="P" {{ $user->sex == 'P' ? 'selected' : '' }}>Perempuan</option>
			                    </select>
							</div>
						</div>

						<div class="form-group row">
							<label for="nationality" class="col-md-4 col-form-label text-md-right">Kewarganegaraan</label>


							<div class="col-md-6">
								{{-- <input id="nationality" type="text" class="form-control" name="nationality" value="{{ $user->nationality }}"> --}}
								<select class="form-control" id="nationality" name="nationality" required>
			                        @foreach($countries as $country)
			                        <option value="{{ $country->name }}" {{ $user->nationality == $country->name ? 'selected' : '' }}>
			                            {{ $country->name }}
			                        </option>
			                        @endforeach
			                    </select>
							</div>
						</div>

						<div class="form-group row">
							<label for="id_type" class="col-md-4 col-form-label text-md-right">Jenis Identitas Diri</label>

							<div class="col-md-6">
								<select class="form-control" id="id_type" name="id_type" required>
			                        <option value="KTP" {{ $user->id_type == 'KTP' ? 'selected' : '' }}>KTP</option>
			                        <option value="Paspor"{{ $user->id_type == 'Paspor' ? 'selected' : '' }}>Paspor</option>
			                        <option value="KITAS"{{ $user->id_type == 'KITAS' ? 'selected' : '' }}>KITAS</option>
			                        <option value="KITAP"{{ $user->id_type == 'KITAP' ? 'selected' : '' }}>KITAP</option>
			                        <option value="Kartu Pelajar"{{ $user->id_type == 'Kartu Pelajar' ? 'selected' : '' }}>Kartu Pelajar</option>
			                        <option value="SIM"{{ $user->id_type == 'SIM' ? 'selected' : '' }}>SIM</option>
			                    </select>
							</div>
						</div>

						<div class="form-group row">
							<label for="id_number" class="col-md-4 col-form-label text-md-right">Nomor Identitas Diri</label>

							<div class="col-md-6">
								<input id="id_number" type="text" class="form-control" name="id_number" value="{{ $user->id_number }}">
							</div>
						</div>

						<div class="form-group row">
							<label for="date_of_birth" class="col-md-4 col-form-label text-md-right">Tanggal Lahir</label>

							<div class="col-md-6">
								<input id="date_of_birth" type="text" class="form-control" name="date_of_birth" value="{{ $user->date_of_birth }}">
							</div>
						</div>

						<div class="form-group row">
							<label for="phone" class="col-md-4 col-form-label text-md-right">Nomor Telepon</label>

							<div class="col-md-6">
								<input id="phone" type="number" class="form-control" name="phone" value="{{ $user->phone }}">
							</div>
						</div>

						<div class="form-group row">
							<label for="community_type" class="col-md-4 col-form-label text-md-right">Status Peserta</label>

							<div class="col-md-6">
								<select class="form-control" id="community_type" name="community_type" required>
			                        <option value="Purna Praja" {{ $user->community_type == 'Purna Praja' ? 'selected' : '' }}>Purna Praja</option>
			                        <option value="Akademisi" {{ $user->community_type == 'Akademisi' ? 'selected' : '' }}>Akademisi</option>
			                        <option value="Mahasiswa" {{ $user->community_type == 'Mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
			                        <option value="Umum" {{ $user->community_type == 'Umum' ? 'selected' : '' }}>Umum</option>
			                    </select>
							</div>
						</div>

						<div class="form-group row">
							<label for="community_name" class="col-md-4 col-form-label text-md-right">Nama Instansi</label>

							<div class="col-md-6">
								<input id="community_name" type="text" class="form-control" name="community_name" value="{{ $user->community_name }}">
							</div>
						</div>

						<div class="row">
		                    <div class="col text-center">
		                        <button type="submit" class="btn btn-primary text-center">Update</button>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript">
    $('#date_of_birth').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd'
    });
</script>
@endsection