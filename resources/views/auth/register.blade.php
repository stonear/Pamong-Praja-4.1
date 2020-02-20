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
    label, button {
        font-weight: bold;
        text-transform: uppercase;
    }
</style>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center py-3 bosc">Daftar {{ config('app.name', 'Laravel') }}</h1>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <h2>Informasi Acara / <i>Event Information</i></h2>

                <div class="form-group">
                    <label for="event_id">Kategori</label>

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

                <h2>Informasi Pribadi / <i>Personal Information</i></h2>

                <div class="form-group">
                    <label for="name">Nama</label>

                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nama lengkap">

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">E-mail</label>

                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Alamat email">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Kata Sandi</label>

                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert" placeholder="Kata sandi">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password-confirm">Konfirmasi Kata Sandi</label>

                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Konfirmasi kata sandi">
                </div>

                <hr/>

                <div class="form-group">
                    <label for="sex">Jenis Kelamin</label>

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

                <div class="form-group">
                    <label for="nationality">Kewarganegaraan</label>

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

                <div class="form-group">
                    <label for="id_type">Jenis Identitas Diri</label>

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

                <div class="form-group">
                    <label for="id_number">Nomor Identitas Diri</label>

                    <input id="id_number" type="text" class="form-control" name="id_number" required placeholder="Nomor identitas">

                    @error('id_number')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="date_of_birth">Tanggal Lahir</label>

                    <input id="date_of_birth" type="text" class="form-control" name="date_of_birth" required placeholder="Tanggal lahir">

                    @error('date_of_birth')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="phone">Nomor Telepon</label>

                    <input id="phone" type="number" class="form-control" name="phone" required placeholder="No telepon">

                    @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="community_type">Status Peserta</label>

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

                <div class="form-group">
                    <label for="community_name">Asal Instansi</label>

                    <input id="community_name" type="text" class="form-control" name="community_name" required placeholder="Asal instansi">

                    @error('community_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <hr/>

                <div class="form-group">
                    <label for="t_shirt">Ukuran Jersey <b>(Khusus Fun Run)</b></label>

                    <div class="row">
                        <div class="col-md-7 col-sm-5 pb-3">
                            <select class="form-control" id="t_shirt" name="t_shirt" required>
                                <option value="-">-</option>
                                <option value="XS">XS</option>
                                <option value="S">S</option>
                                <option value="M">M</option>
                                <option value="L">L</option>
                                <option value="XL">XL</option>
                                <option value="XXL">XXL</option>
                                <option value="3XL">3XL</option>
                            </select>
                        </div>
                        <div class="col-md-5 col-sm-7">
                            <button class="btn btn-primary btn-block" type="button" data-toggle="modal" data-target="#size">Lihat Ukuran Baju</button>
                        </div>
                    </div>

                    @error('t_shirt')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <hr/>

                <div class="form-group">
                    <label for="recaptcha"></label>

                    {!! NoCaptcha::renderJs() !!}
                    {!! NoCaptcha::display() !!}

                    @error('g-recaptcha-response')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <span class="caution">
                        <strong>
                            * Pastikan data yang anda isi benar.
                            <br/>
                            ** pengisian data hanya dapat dilakukan sekali saja.
                        </strong>
                    </span>
                </div>
                <div class="row">
                    <div class="col text-center">
                        <button type="submit" class="btn btn-primary text-center">Daftar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="size" tabindex="-1" role="dialog" aria-labelledby="size" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="size">UKURAN JERSEY</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">XS</th>
                            <th scope="col">S</th>
                            <th scope="col">M</th>
                            <th scope="col">L</th>
                            <th scope="col">XL</th>
                            <th scope="col">XXL</th>
                            <th scope="col">3XL</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">Lebar</th>
                            <td>45</td>
                            <td>48</td>
                            <td>50</td>
                            <td>53</td>
                            <td>55</td>
                            <td>58</td>
                            <td>60</td>
                        </tr>
                        <tr>
                            <th scope="row">Panjang</th>
                            <td>65</td>
                            <td>67</td>
                            <td>70</td>
                            <td>72</td>
                            <td>75</td>
                            <td>77</td>
                            <td>80</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
