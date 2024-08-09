@extends('dashboard.layout.main')
@section('container')
    <form action="{{ url('/dashboard/uploadSickLetter') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="status" value="{{ request('status') }}">
        <div class="row mt-3">
            <div class="col">
                <label for="suratSakit">Upload Surat Sakit:</label>
                <input type="file" id="suratSakit" name="suratSakit" accept=".pdf, .doc, .docx, .jpg, .png">
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
@endsection
