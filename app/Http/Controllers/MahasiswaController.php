<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['mahasiswas'] = Mahasiswa::get();

        return view('mahasiswa.index', $data);
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
        $request->validate([
            'nama' => 'required',
            'kelas' => 'required'
        ]);
        try {
            $data = new Mahasiswa();
            $data->nama = $request->nama;
            $data->kelas = $request->kelas;
            $data->save();

            return redirect()->route('mahasiswa.index')->with('success', 'Success Add Mahasiswa');
        } catch (\Throwable $th) {
            return redirect()->route('mahasiswa.index')->with('failed', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        $data['mahasiswa'] = $mahasiswa;
        return view('mahasiswa.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        $data['mahasiswa'] = $mahasiswa;
        return view('mahasiswa.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $request->validate([
            'nama' => 'required',
            'kelas' => 'required'
        ]);
        try {
            $mahasiswa->nama = $request->nama;
            $mahasiswa->kelas = $request->kelas;
            $mahasiswa->save();

            return redirect()->route('mahasiswa.index')->with('success', 'Success Update Mahasiswa');
        } catch (\Throwable $th) {
            return redirect()->route('mahasiswa.index')->with('failed', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')->with('success', 'Success Delete Data');
    }
}
