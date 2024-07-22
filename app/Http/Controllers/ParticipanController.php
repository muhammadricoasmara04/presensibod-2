<?php

namespace App\Http\Controllers;

use App\Models\Participan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $dataURL = $request->input('image');
        $image = str_replace('data:image/png;base64,', '', $dataURL);
        $image = str_replace(' ', '+', $image);
        $imageName = 'photo_' . time() . '.png';

        Storage::disk('public')->put($imageName, base64_decode($image));

        // Simpan informasi foto di database jika perlu
        // Misalnya, simpan di tabel participants

        $presensi = new Participan();
        $presensi->image = $imageName;
        // Tambahkan atribut lain yang diperlukan
        $presensi->save();

        return response()->json(['message' => 'Photo saved successfully', 'image' => $imageName]);
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
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('');
    }
}
