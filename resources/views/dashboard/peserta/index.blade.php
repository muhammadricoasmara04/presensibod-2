@extends('dashboard.layout.main')
@section('container')
    <link href='/css/peserta_dashboard.css' rel='stylesheet'>
    <h3>Presensi Harian </h3>

    <div class="presen_content">
        <div class="presen_box">
            <div class="button-container">
                <a href="/dashboard/create" type="button" class="btn btn-primary custom-btn">
                    Check In
                    <span class="d-flex justify-content-center align-items-center gap-2">
                        {{ $presensitoday != null ? $checkin_in : 'Belum Absen' }}</span>
                </a>
                <a href="/dashboard/create" type="button" class="btn btn-primary custom-btn">
                    Check Out
                    <span class="d-flex justify-content-center align-items-center gap-2">test</span>
                </a>
            </div>
        </div>
    </div>
@endsection
