<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Fasilitas;
use App\Models\Kamar;
use App\Models\Ulasan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Home',
            'metaTitle' => 'Home',
            'metaDescription' => 'Home',
            'metaKeywords' => 'Home',
            'url' => route('home'),
            'kamar' => Kamar::latest()->limit(6)->get(),
            'fasilitas' => Fasilitas::all(),
            'ulasan' => Ulasan::where('rating', '>', 4)->latest()->limit(6)->get(),
        ];
        return view('front.pages.home.index', $data);
    }
}
