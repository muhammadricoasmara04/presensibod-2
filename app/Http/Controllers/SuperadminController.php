<?php

namespace App\Http\Controllers;

use App\Models\Superadmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class SuperadminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("dashboard.superadmin.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Superadmin $superadmin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Superadmin $superadmin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Superadmin $superadmin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Superadmin $superadmin)
    {
        //
    }
    public function userAll()
    {
        $usersDB = DB::table('users')->get(); // Mengambil semua data dari tabel users
        return view('dashboard.superadmin.show', compact('usersDB'));
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('');
    }
}
