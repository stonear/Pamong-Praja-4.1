@extends('layouts.app')

@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet">
<style>
    .caution {
        width: 100%;
        margin-top: .25rem;
        font-size: 80%;
        color: #dc3545;
    }
</style>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="event_id" class="col-md-4 col-form-label text-md-right">Kategori</label>

                            <div class="col-md-6">
                                <select class="form-control" id="event_id" name="event_id" required>
                                    @foreach($events as $e)
                                    <option value="{{ $e->id }}">{{ $e->name . ' Rp. ' . number_format($e->price) . ',-' }}</option>
                                    @endforeach
                                </select>

                                @error('event_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="t_shirt" class="col-md-4 col-form-label text-md-right">Ukuran Baju<br>(Khusus Fun Run)</label>

                            <div class="col-md-6">
                                <select class="form-control" id="t_shirt" name="t_shirt" required>
                                    <option value="-">-</option>
                                    <option value="XS">XS (45 x 65)</option>
                                    <option value="S">S (48 x 67)</option>
                                    <option value="M">M (50 x 70)</option>
                                    <option value="L">L (53 x 72)</option>
                                    <option value="XL">XL (55 x 75)</option>
                                    <option value="XXL">XXL (58 x 77)</option>
                                    <option value="3XL">3XL (60 x 80)</option>
                                </select>

                                @error('t_shirt')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <hr/>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nama</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Kata Sandi</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Konfirmasi Kata Sandi</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <hr/>

                        <div class="form-group row">
                            <label for="sex" class="col-md-4 col-form-label text-md-right">Jenis Kelamin</label>

                            <div class="col-md-6">
                                <select class="form-control" id="sex" name="sex" required>
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>

                                @error('sex')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nationality" class="col-md-4 col-form-label text-md-right">Kewarganegaraan</label>

                            <div class="col-md-6">
                                <select class="form-control" id="nationality" name="nationality" required>
                                    @foreach($countries as $country)
                                    <option value="{{ $country->name }}" {{ $country->code == "ID" ? "selected" : "" }}>
                                        {{ $country->name }}
                                    </option>
                                    @endforeach
                                </select>

                                @error('nationality')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="id_type" class="col-md-4 col-form-label text-md-right">Jenis Identitas Diri</label>

                            <div class="col-md-6">
                                <select class="form-control" id="id_type" name="id_type" required>
                                    <option value="KTP">KTP</option>
                                    <option value="Paspor">Paspor</option>
                                    <option value="KITAS">KITAS</option>
                                    <option value="KITAP">KITAP</option>
                                    <option value="Kartu Pelajar">Kartu Pelajar</option>
                                    <option value="SIM">SIM</option>
                                </select>

                                @error('id_type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="id_number" class="col-md-4 col-form-label text-md-right">Nomor Identitas Diri</label>

                            <div class="col-md-6">
                                <input id="id_number" type="text" class="form-control" name="id_number" required>

                                @error('id_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date_of_birth" class="col-md-4 col-form-label text-md-right">Tanggal Lahir</label>

                            <div class="col-md-6">
                                <input id="date_of_birth" type="text" class="form-control" name="date_of_birth" required>

                                @error('date_of_birth')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">Nomor Telepon</label>

                            <div class="col-md-6">
                                <input id="phone" type="number" class="form-control" name="phone" required>

                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="community_type" class="col-md-4 col-form-label text-md-right">Status Peserta</label>

                            <div class="col-md-6">
                                <select class="form-control" id="community_type" name="community_type" required>
                                    <option value="Purna Praja">Purna Praja</option>
                                    <option value="Akademisi">Akademisi</option>
                                    <option value="Mahasiswa">Mahasiswa</option>
                                    <option value="Umum">Umum</option>
                                </select>

                                @error('community_type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="community_name" class="col-md-4 col-form-label text-md-right">Asal Instansi</label>

                            <div class="col-md-6">
                                <input id="community_name" type="text" class="form-control" name="community_name" required>

                                @error('community_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <hr/>

                        <div class="form-group row">
                            <label for="recaptcha" class="col-md-4 col-form-label text-md-right"></label>

                            <div class="col-md-6">
                                {!! NoCaptcha::renderJs() !!}
                                {!! NoCaptcha::display() !!}

                                @error('g-recaptcha-response')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <span class="caution">
                                    <strong>
                                        * Pastikan data yang anda isi benar
                                        <br/>
                                        ** pengisian data hanya dapat dilakukan sekali saja.
                                    </strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Daftar
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript">
    $('#date_of_birth').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd'
    });
</script>
@endsection
