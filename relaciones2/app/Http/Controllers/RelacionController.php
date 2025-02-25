<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use App\Models\Alumno;
use Illuminate\Http\Request;

class RelacionController extends Controller
{
    public function index()
    {
        $alumno = Alumno::find(1);
        $materia = Materia::find(2);
        return view('welcome',compact('alumno','materia'));
    }
}
