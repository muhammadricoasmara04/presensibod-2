<?php

namespace App\Http\Controllers;

use App\Models\Participan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ParticipanController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('/dashboard/peserta/index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('/dashboard/peserta/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $name   = $request->user()->name;
        $location = $request->location;
        $image = $request->image;
        $checkin_time = date("H:i:s");
        $checkout_time = date("H:i:s");
        $date = date("Y-m-d");
        $folder_path = "public/uploads/absensi/";
        $formatName = $name . "-" . $date;
        $image_parts = explode(";base64", $image);
        $image_base64 = base64_decode($image_parts[1]);
        $fileName = $formatName . ".png";
        $file = $folder_path . $fileName;
        $data = [
            'name' => $name,
            'date' => $date,
            'checkin_time' => $checkin_time,
            'image' => $fileName,
            'location_in' => $location,
        ];

        $simpan = DB::table('presensi')->insert($data);
        if ($simpan) {
            echo 0;
            Storage::put($file, $image_base64);
        } else {
            echo 1;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Participan $participan)
    {
        return view('/dashboard/peserta/show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Participan $participan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Participan $participan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Participan $participan)
    {
        //
    }

    public function showMap()
    {
        $user = Auth::user();
        return view('map', compact('user'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('');
    }
}
