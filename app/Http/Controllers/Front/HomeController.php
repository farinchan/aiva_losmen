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

    public function about()
    {
        $data = [
            'title' => 'About',
            'metaTitle' => 'About',
            'metaDescription' => 'About',
            'metaKeywords' => 'About',
            'url' => route('about'),
        ];
        return view('front.pages.home.about', $data);
    }

    public function contact()
    {
        $data = [
            'title' => 'Contact',
            'metaTitle' => 'Contact',
            'metaDescription' => 'Contact',
            'metaKeywords' => 'Contact',
            'url' => route('contact'),
        ];
        return view('front.pages.home.contact', $data);
    }
}
