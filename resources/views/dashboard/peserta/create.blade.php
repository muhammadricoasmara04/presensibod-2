@extends('dashboard.layout.main')
@section('container')
    <div class="row">
        <div class="col">
            <div id="webcamContainer" style="display: relative; height:100px; width:600px;">
                <video id="webcam" autoplay playsinline style="width:70%; height:auto;"></video>
                <br />
                <button onclick="takeSnapshot()">Checkin</button>
                <div id="results"></div>
            </div>
        </div>
    </div>
@endsection
