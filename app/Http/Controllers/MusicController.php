<?php

namespace App\Http\Controllers;

use App\Models\Music;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class MusicController extends Controller
{

    public function index()
    {

        $query = Music::latest();
        if (request('search')) {
            $query->where('judul', 'like', '%' . request('search') . '%')
                ->orWhere('makna', 'like', '%' . request('search') . '%');
        }
        $musics = $query->paginate(6)->withQueryString();
        return view('homepage', compact('musics'));
    }

    public function detail($id)
    {
        $music = Music::find($id);
        return view('detail', compact('music'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('input', compact('categories'));
    }

    public function store(Request $request)
    {
        // Validasi data
        $validator = Validator::make($request->all(), [
            'id' => ['required', 'string', 'max:255', Rule::unique('music', 'id')],
            'judul' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'makna' => 'required|string',
            'tahun' => 'required|integer',
            'penyanyi' => 'required|string',
            'foto_sampul' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        // Jika validasi gagal, kembali ke halaman input dengan pesan kesalahan
        if ($validator->fails()) {
            return redirect('musics/create')
                ->withErrors($validator)
                ->withInput();
        }

        $randomName = Str::uuid()->toString();
        $fileExtension = $request->file('foto_sampul')->getClientOriginalExtension();
        $fileName = $randomName . '.' . $fileExtension;

        // Simpan file foto ke folder public/images
        $request->file('foto_sampul')->move(public_path('images'), $fileName);
        // Simpan data ke table musics
        music::create([
            'id' => $request->id,
            'judul' => $request->judul,
            'category_id' => $request->category_id,
            'makna' => $request->makna,
            'tahun' => $request->tahun,
            'penyanyi' => $request->penyanyi,
            'foto_sampul' => $fileName,
        ]);

        return redirect('/')->with('success', 'Data berhasil disimpan');
    }

    public function data()
    {
        $musics = Music::latest()->paginate(10);
        return view('data-musics', compact('musics'));
    }

    public function edit($id)
    {
        $music = Music::find($id);
        $categories = Category::all();
        return view('form-edit', compact('music', 'categories'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data
        $validator = Validator::make($request->all(), [
            'judul' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'makna' => 'required|string',
            'tahun' => 'required|integer',
            'penyanyi' => 'required|string',
            'foto_sampul' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Jika validasi gagal, kembali ke halaman edit dengan pesan kesalahan
        if ($validator->fails()) {
            return redirect("/musics/edit/{$id}")
                ->withErrors($validator)
                ->withInput();
        }

        // Ambil data music yang akan diupdate
        $music = Music::findOrFail($id);

        // Jika ada file yang diunggah, simpan file baru
        if ($request->hasFile('foto_sampul')) {
            $randomName = Str::uuid()->toString();
            $fileExtension = $request->file('foto_sampul')->getClientOriginalExtension();
            $fileName = $randomName . '.' . $fileExtension;

            // Simpan file foto ke folder public/images
            $request->file('foto_sampul')->move(public_path('images'), $fileName);

            // Hapus foto lama jika ada
            if (File::exists(public_path('images/' . $music->foto_sampul))) {
                File::delete(public_path('images/' . $music->foto_sampul));
            }

            // Update record di database dengan foto yang baru
            $music->update([
                'judul' => $request->judul,
                'makna' => $request->makna,
                'category_id' => $request->category_id,
                'tahun' => $request->tahun,
                'penyanyi' => $request->penyanyi,
                'foto_sampul' => $fileName,
            ]);
        } else {
            // Jika tidak ada file yang diunggah, update data tanpa mengubah foto
            $music->update([
                'judul' => $request->judul,
                'makna' => $request->makna,
                'category_id' => $request->category_id,
                'tahun' => $request->tahun,
                'penyanyi' => $request->penyanyi,
            ]);
        }

        return redirect('/musics/data')->with('success', 'Data berhasil diperbarui');
    }

    public function delete($id)
    {
        $music = Music::findOrFail($id);

        // Delete the music's photo if it exists
        if (File::exists(public_path('images/' . $music->foto_sampul))) {
            if ($music->foto_sampul != 'default.jpg') {
                File::delete(public_path('images/' . $music->foto_sampul));
            }
        }

        // Delete the music record from the database
        $music->delete();

        return redirect('/musics/data')->with('success', 'Data berhasil dihapus');
    }
}
