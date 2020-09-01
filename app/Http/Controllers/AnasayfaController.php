<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;

class AnasayfaController extends Controller
{
    public function index() {

        $date = Carbon::parse('2016-06-01');
        $yenitarih= $date->addMonths(8);

        return view('anasayfa',compact('yenitarih'));
    }
}
