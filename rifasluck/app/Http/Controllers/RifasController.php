<?php

namespace App\Http\Controllers;
use App\Models\Rifa;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RifasController extends Controller
{
    public function index()
    {
        $rifas = Rifa::all();
        return view('rifas', ['rifas' => $rifas]);
    }

    public function show($id)
    {
        $rifa = Rifa::findOrFail($id);
        return view('rifa', ['rifa' => $rifa]);
    }
}
