<?php

namespace App\Http\Controllers;

use App\Models\Tariff;

class TariffController extends Controller
{
    public function index()
    {
        $tariffs = Tariff::with('category')->get();

        return view('tariffs.index', compact('tariffs'));
    }
}
