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
                <button class="btncreate btn-danger btn-block" id="takecapture">
                    <i class='bx bx-camera'></i>
                    <span class="text nav-text">Absen Pulang</span>
                </button>
            @else
                <button class="btncreate btn-primary btn-block" id="takecapture">
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
    <div>
        <input type="text" id="status" value="{{ request('status') }}">
    </div>

      <div>
        <input type="text" id="reason" value="{{ request('reason') }}">
    </div>
    <script></script>
@endsection
