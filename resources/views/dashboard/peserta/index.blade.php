@extends('dashboard.layout.main')
@section('container')
    <link href='/css/peserta_dashboard.css' rel='stylesheet'>
    <h3>Presensi Harian </h3>

    <div class="presen_content">
        <div class="presen_box">
            <div class="button-container">
                <button type="button" class="btn btn-primary" id="checkinBtn">Checkin</button>
                <button type="button" class="btn btn-primary">Checkout</button>
                <a href="/dashboard/peserta/create" type="button" class="btn btn-primary">Absen</a>
            </div>
        </div>
    </div>

    {{-- <div class="modal fade" id="cameraModal" tabindex="-1" role="dialog" aria-labelledby="cameraModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cameraModalLabel">Take Picture</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <video id="video" width="100%" autoplay></video>
                    <button id="snap" class="btn btn-primary">Snap Photo</button>
                    <canvas id="canvas" style="display:none;"></canvas>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="savePhoto">Save Photo</button>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
