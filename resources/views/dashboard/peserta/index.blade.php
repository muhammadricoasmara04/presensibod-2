@extends('dashboard.layout.main')
@section('container')
    <link href='/css/peserta_dashboard.css' rel='stylesheet'>
    <h3>Presensi Harian </h3>

    <div class="presen_content">
        <div class="presen_box">
            <div class="button-container">
                <a href="/dashboard/peserta/create" type="button" class="btn btn-primary">Check In</a>
                <a href="/dashboard/peserta/create" type="button" class="btn btn-primary">Check Out</a>
            </div>
        </div>
    </div>
@endsection
