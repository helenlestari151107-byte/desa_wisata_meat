<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\ProfilDesa;
use Illuminate\Http\Request;

class ProfilDesaController extends Controller {
    public function index() {
        $profil = ProfilDesa::firstOrCreate([], ['nama_desa' => 'Desa Wisata Meat']);
        return view('admin.profil.index', compact('profil'));
    }

    public function update(Request $request, ProfilDesa $profilDesa) {
        $request->validate([
            'nama_desa'  => 'required',
            'foto_kepala_desa' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $data = $request->except(['_token','_method','foto_kepala_desa']);
        if ($request->hasFile('foto_kepala_desa')) {
            if ($profilDesa->foto_kepala_desa) \Storage::disk('public')->delete($profilDesa->foto_kepala_desa);
            $data['foto_kepala_desa'] = $request->file('foto_kepala_desa')->store('profil','public');
        }
        $profilDesa->update($data);
        return redirect()->route('admin.profil.index')->with('success','Profil desa diperbarui!');
    }
}