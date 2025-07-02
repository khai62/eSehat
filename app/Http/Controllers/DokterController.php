<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DokterController extends Controller
{
    public function edit(Request $request)
    {
        return view('components.dokter.profile-edit', [
            'user' => $request->user(),
        ]);
    }

public function update(Request $request)
{
    $user = $request->user();

    $data = $request->validate([
        'no_hp'         => 'required|string',
        'gender'        => 'required|in:Laki-laki,Perempuan',
        'spesialis'     => 'required|string',
        'no_lisensi'    => 'required|string',
        'pengalaman'    => 'required|integer|min:0',
        'alamat_klinik' => 'required|string',
        'pendidikan'    => 'required|string',
        'deskripsi'     => 'required|string',
        'foto'          => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    if ($request->hasFile('foto')) {
        // hapus lama
        if ($user->foto) {
            Storage::disk('public')->delete($user->foto);
        }
        // simpan baru → storage/dokter_profiles/...
        $path           = $request->file('foto')
                                  ->store('dokter_profiles', 'public');
        $data['foto']   = $path;           // dokter_profiles/xxx.jpg
    }

    $user->update($data);

    return back()->with('status', 'Profil berhasil diperbarui!');
}

}
