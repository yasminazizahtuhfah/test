<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Identitas;
use App\Models\Portofolio;
use Illuminate\Http\Request;

class landingpageController extends Controller
{
    public function index()
    {
        $identitasData = Identitas::all();
        $portofolioData = Portofolio::all();

        return view('landing-page.index', compact('identitasData', 'portofolioData'));
    }
}
