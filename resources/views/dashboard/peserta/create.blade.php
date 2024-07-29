@extends('dashboard.layout.main')
@section('container')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js"></script>

    <h1>Webcam Test</h1>
    <div class="row" style="margin-top:40">
        <div class="col d-flex">
            <input type="hidden" id=location>
            <div id="webcam">
                <!-- Webcam video akan ditampilkan di sini -->
            </div>
            <div id="map">
                <!-- Peta akan ditampilkan di sini -->
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col">
            @if ($check > 0)
                <button class="btn btn-danger btn-block" id="takecapture">
                    <i class='bx bx-camera'></i>
                    <span class="text nav-text">Absen Pulang</span>
                </button>
            @else
                <button class="btn btn-primary btn-block" id="takecapture">
                    <i class='bx bx-camera'></i>
                    <span class="text nav-text">Absen Masuk</span>
                </button>
            @endif
        </div>
    </div>
    <div class="row mt-3">
        <div class="col">
            <div id="userData" data-username="{{ Auth::user()->name }}"></div>
        </div>
    </div>

    <script></script>
@endsection
