<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Kamar;
use App\Models\MetodePembayaran;
use App\Models\Tipe;
use App\Models\Ulasan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class KamarController extends Controller
{
    public function listKamar(Request $request)
    {
        $tipe = $request->get('tipe');
        $checkIn = $request->get('check_in');
        $checkOut = $request->get('check_out');

        if ($checkIn) {
            $checkIn = Carbon::createFromFormat('m/d/Y', $checkIn)->format('Y-m-d');
        }

        if ($checkOut) {
            $checkOut = Carbon::createFromFormat('m/d/Y', $checkOut)->format('Y-m-d');
        }

        $kamar = Kamar::with(['tipe', 'fasilitasKamar', 'ulasan', 'transaksi'])

            ->when($tipe, function ($query) use ($tipe) {
                return $query->where('tipe_id', $tipe);
            })

            ->when($checkIn && $checkOut, function ($query) use ($checkIn, $checkOut) {
                return $query->whereDoesntHave('transaksi', function ($query) use ($checkIn, $checkOut) {
                    $query->where(function ($query) use ($checkIn, $checkOut) {
                        $query->where('check_in', '>=', $checkIn)
                            ->where('check_in', '<', $checkOut);
                    })->orWhere(function ($query) use ($checkIn, $checkOut) {
                        $query->where('check_out', '>', $checkIn)
                            ->where('check_out', '<=', $checkOut);
                    });
                });
            })

            ->latest()
            ->paginate(9);


        $data = [
            'title' => 'List Kamar',
            'metaTitle' => 'List Kamar',
            'metaDescription' => 'List Kamar',
            'metaKeywords' => 'List Kamar',
            'url' => route('kamar'),
            'list_tipe' => Tipe::all(),
            'kamar' => $kamar,
        ];
        // dd($data);
        // return response()->json($data);
        return view('front.pages.kamar.list', $data);
    }

    public function detailKamar($id)
    {
        $kamar = Kamar::with(['tipe', 'fasilitasKamar', 'ulasan'])->findOrFail($id);

        $data = [
            'title' => 'Detail Kamar',
            'metaTitle' => 'Detail Kamar',
            'metaDescription' => 'Detail Kamar',
            'metaKeywords' => 'Detail Kamar',
            'url' => route('kamar.detail', $id),
            'kamar' => $kamar,
            'ulasan_positif_percentage' => $kamar->ulasan->count() == 0 ? 0 : round($kamar->ulasan->where('rating', '>=', 4)->count() / $kamar->ulasan->count() * 100, 1),
            'ulasan_netral_percentage' => $kamar->ulasan->count() == 0 ? 0 : round($kamar->ulasan->where('rating', '>', 2)->where('rating', '<', 4)->count() / $kamar->ulasan->count() * 100, 1),
            'ulasan_negatif_percentage' => $kamar->ulasan->count() == 0 ? 0 : round($kamar->ulasan->where('rating', '<=', 2)->count() / $kamar->ulasan->count() * 100, 1),
            'ulasan_pagination' => Ulasan::where('kamar_id', $id)->latest()->paginate(4),
        ];

        return view('front.pages.kamar.detail', $data);
    }

    public function ulasanStore(Request $request, $id)
    {
        $request->validate([
            'rating' => 'required|numeric|min:1|max:5',
            'komentar' => 'required',
        ]);

        Ulasan::create([
            'kamar_id' => $id,
            'pelanggan_id' => auth()->guard('pelanggan')->user()->id_pelanggan,
            'rating' => $request->rating,
            'komentar' => $request->komentar,
        ]);

        return redirect()->back()->with('success', 'Ulasan berhasil ditambahkan');
    }

    
}
