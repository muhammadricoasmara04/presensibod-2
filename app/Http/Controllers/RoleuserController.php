<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleuserController extends Controller
{
    function admin()
    {
        echo "halo selamat datang dihalaman admin " . Auth::user()->name;
        echo "<a href='logout'>loguot>></a>";
    }
    function participan()
    {
        echo "halo selamat datang dihalaman participans" . Auth::user()->name;
        echo "<a href='logout'>loguot>></a>";
    }
}
