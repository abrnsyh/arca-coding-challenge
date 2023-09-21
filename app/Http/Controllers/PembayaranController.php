<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PembayaranController extends Controller {
    public function index() {
        $data = Pembayaran::paginate(15);
        return Inertia::render('MainApps', [
            'allPembayaran' => $data
        ]);
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'pembayaran' => 'required|integer|min:1',
            'buruh.*.name' => 'required|string',
            'buruh.*.percentage' => 'required|integer',
            'buruh.*.salary' => 'required|integer'
        ]);


        foreach ($validatedData['buruh'] as $key => $val) {
            Pembayaran::create([
                'buruh_name' => $val['name'],
                'amount' => $validatedData['pembayaran'],
                'percentage' => $val['percentage'],
                'buruh_salary' => $val['salary']
            ]);
        }

        return redirect()->back();
    }

    public function destroy($id) {
        Pembayaran::findOrFail($id)->delete();

        return redirect()->back();
    }
}