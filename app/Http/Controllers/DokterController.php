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

        $validated = $request->validate([
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

        // Simpan foto baru jika ada
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($user->foto) {
                Storage::disk('public')->delete($user->foto);
            }

            // Upload foto baru
            $validated['foto'] = $request->file('foto')->store('dokter_profiles', 'public');
        }

        $user->update($validated);

        return back()->with('status', 'Profil berhasil diperbarui!');
    }
}
