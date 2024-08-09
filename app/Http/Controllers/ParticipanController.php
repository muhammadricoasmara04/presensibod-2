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
        $today = date("Y-m-d");
        $name   = Auth::user()->name;
        $presensitoday = DB::table('presensi')->where('name', $name)->where('date', $today)->first();
        $checkin_in = $presensitoday ? $presensitoday->checkin_time : 'Belum Absen';
        $checkout_out = $presensitoday && $presensitoday->checkout_time ? $presensitoday->checkout_time : 'Belum Absen';
        return view('/dashboard/peserta/index', compact('presensitoday', 'checkin_in', 'checkout_out'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $today = date("Y-m-d");
        $name   = Auth::user()->name;
        $check = DB::table('presensi')->where('date', $today)->where('name', $name)->count();
        return view('/dashboard/peserta/create', compact('check'));
    }

    public function uploadSickLetter(Request $request)
    {
        $request->validate([
            'suratSakit' => 'required|file|mimes:pdf,doc,docx,jpg,png|max:2048',
        ]);
        $location = $request->location;
        $file = $request->file('suratSakit');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('surat', $fileName, 'public');

        DB::table('presensi')->insert([
            'name' => $request->user()->name,
            'status' => $request->status,
            'sick_letter' => $filePath,
            'date' => date('Y-m-d'),
            'checkin_time' => date("H:i:s"),
            'location_in' => $location,
        ]);

        return redirect('/dashboard')->with('success', 'Surat sakit berhasil diunggah.');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $location = $request->location;
        $name = $request->user()->name;
        $image = $request->image;
        $checkin_time = date("H:i:s");
        $checkout_time = date("H:i:s");
        $date = date("Y-m-d");
        $status = $request->status;
        $reason = $request->reason;
        $folder_path = "public/uploads/absensi/";
        $image_parts = explode(";base64,", $image);
        $image_base64 = base64_decode($image_parts[1]);
        $check = DB::table('presensi')->where('date', $date)->where('name', $name)->count();

        if ($check > 0) {
            $formatName = $name . "-" . $date . "-checkout";
            $fileName = $formatName . ".png";
            $file = $folder_path . $fileName;
            $date_out = [
                'checkout_time' => $checkout_time,
                'image_out' => $fileName,
                'location_out' => $location,
            ];
            $update = DB::table('presensi')->where('date', $date)->where('name', $name)->update($date_out);
            if ($update) {
                echo "success|Terimakasih, Sudah Absen Pulang|out";
                Storage::put($file, $image_base64);
            } else {
                echo "error|Maaf Gagal Absen Pulang, Silahkan Hubungi Admin FHCI|out ";
            }
        } else {
            $formatName = $name . "-" . $date . "-checkin";
            $fileName = $formatName . ".png";
            $file = $folder_path . $fileName;

            $data = [
                'name' => $name,
                'date' => $date,
                'checkin_time' => $checkin_time,
                'image_in' => $fileName,
                'location_in' => $location,
                'status' => $status,
                'reason' => $reason,
            ];



            $simpan = DB::table('presensi')->insert($data);
            if ($simpan) {
                echo "success|Terimakasih, Selamat Menjalankan Aktivitasnya|in";
                Storage::put($file, $image_base64);
            } else {
                echo "error|Maaf Gagal Absen, Silahkan Hubungi Admin FHCI|in";
            }
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
