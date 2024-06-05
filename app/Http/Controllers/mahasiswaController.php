<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa;
use Illuminate\Http\Request;

class mahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('mahasiswa.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // kalo input data kosong
        $request->validate([            
            'nim' => 'required|numeric|unique:mahasiswas,nim',
            'nama' => 'required',
            'jurusan' =>'required',
        ],[
            // buat mengubah required 
            'nim.required' =>'NIM wajib diisi', 
            'nim.numeric' =>'NIM wajib diisi dalam angka', 
            'nim.unique' =>'NIM yang diisikan sudah dalam database', 
            'nama.required' =>'Nama wajib diisi', ~ 
            'jurusan.required' =>'jurusan wajib diisi', 
        ]);
        $data = [
            'nim'=> $request->nim,
            'nama'=> $request->nama,
            'jurusan'=> $request->jurusan,
        ];
        // masuk ke tabel mahasiswa
        mahasiswa::create($data);
        return 'hi';
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
