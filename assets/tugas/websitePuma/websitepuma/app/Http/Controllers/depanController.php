<?php

namespace App\Http\Controllers;

use App\Models\halaman;
use App\Models\riwayat;
use Illuminate\Http\Request;

class depanController extends Controller
{
    public function index()
    {
        $about_id = get_meta_value('_halaman_about');
        $about_data = halaman::where('id', $about_id)->first();

        $location_id = get_meta_value('_halaman_location');
        $location_data = halaman::where('id', $location_id)->first();

        $payment_id = get_meta_value('_halaman_payment');
        $payment_data = halaman::where('id', $payment_id)->first();

        $product_data = riwayat::where('tipe', 'experience')->get();
        $machine_data = riwayat::where('tipe', 'education')->get(); 

        return view('dashboard.depan.index')
        ->with([
            'about' => $about_data,
            'location' => $location_data,
            'payment' => $payment_data,
            'product' => $product_data,
            'machine' => $machine_data
        ]);
    }
}