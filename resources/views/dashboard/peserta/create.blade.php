@extends('dashboard.layout.main')
@section('container')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js"></script>
    <h1>Webcam Test</h1>
    {{-- <div id="webcam"></div>
    <button id="snap">Snap Photo</button>
    <canvas id="canvas" style="display:none;"></canvas> --}}
    <div class="row" style="margin-top:40">
        <div class="col">
            <input type="text" id=location>
            <div id="webcam">
            </div>
        </div>
    </div>
    <div class="row">
    <button id="takeabsen" class="btn btn-primary btn-blok">Absen Masuk</button>
    </div>



    <script>
        Webcam.set({
            height: 100,
            width: 300,
            image_format: 'jpeg',
            jpeg_quality: 80
        });
        Webcam.attach('#webcam');
    </script>
@endsection
