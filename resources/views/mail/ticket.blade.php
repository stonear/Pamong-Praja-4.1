@component('mail::message')
# Kepada Yth. <b>{{ $user->name }}</b>.

Terima kasih atas partisipasinya dalam kegiatan {{ config('app.name') }}.

Pengambilan <b>Seminar Kit</b> dapat dilakukan ditempat acara <i>Hotel Aria Gajayana Malang</i>, Sedangkan Pengambilan <b>Fun Run Racepack</b> dapat dilakukan di <i>BPSDM Prov Jatim, Jl. Kawi No 41 Malang</i> mulai tanggal <b>20 Maret 2020 pukul 13.00 WIB</b>.

<b>NB:</b> <i>Setiap kegiatan harap menunjukkan e tiket kepada panitia.</i>

Tiket dapat diunduh melalui lampiran email ini, atau melalui website {{ config('app.name') }}.

{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}

Terima Kasih,<br/>
<b>Panitia {{ config('app.name') }}</b>
@endcomponent
