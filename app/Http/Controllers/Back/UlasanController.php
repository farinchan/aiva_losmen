<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Ulasan;
use Illuminate\Http\Request;

class UlasanController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Ulasan',
            'menu' => 'Manajemen Ulasan',
            'submenu' => 'Ulasan',
            'ulasan' => Ulasan::with(['kamar', 'user'])->get(),
        ];
        return view('back.pages.ulasan.index', $data);
    }
}
