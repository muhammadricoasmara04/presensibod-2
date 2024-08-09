@extends('dashboard.layout.main')
@section('container')
    <link href='/css/peserta_dashboard.css' rel='stylesheet'>
    <h3>Presensi Harian</h3>

    @if ($presensitoday == null)
        <div class="wrapperbtn d-flex flex-column align-items-center py-3">
            <a href="{{ url('/dashboard/create?status=Hadir') }}" class="btn btn-primary w-75 mb-2"
                data-status="Hadir">Hadir</a>

            <a href="#" id="izinBtn" class="btn btn-primary w-75 mb-2"
                data-url="{{ url('/dashboard/create?status=Izin') }}" data-status="Izin">Izin</a>

            <a href="{{ url('/dashboard/create?status=Sakit') }}" class="btn btn-primary w-75 mb-2"
                data-status="Sakit">Sakit</a>

            <div href="#" id="wfaBtn" class="btn btn-primary w-75 mb-2"
                data-url="{{ url('/dashboard/create?status=WFA') }}" data-status="WFA">WFA</a>
            </div>
        @else
            <div class="wrapper">
                <div class="presen_content">
                    <div id="current_time" class="current-time mb-3"></div>
                    <div class="button-container">
                        <a href="/dashboard/create" type="button" class="btn btn-primary custom-btn" id="checkin-button">
                            Check In
                            <span class="d-flex justify-content-center align-items-center gap-2">
                                {{ $presensitoday != null ? $checkin_in : 'Belum Absen' }}
                            </span>
                        </a>
                        <a href="/dashboard/create" type="button" class="btn btn-primary custom-btn">
                            Check Out
                            <span class="d-flex justify-content-center align-items-center gap-2">
                                {{ $presensitoday != null && $presensitoday->checkout_time ? $checkout_out : 'Belum Absen' }}
                            </span>
                        </a>
                    </div>
                </div>
            </div>
    @endif
@endsection
