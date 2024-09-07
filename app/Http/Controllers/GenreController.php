<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Http\Controllers\Controller;
use App\Http\Requests\GenreStoreRequest;
use App\Http\Requests\GenreUpdateRequest;
use App\Http\Resources\GenreResource;

class GenreController extends Controller
{
    public function index()
    {
        $genre = Genre::all();

        return GenreResource::collection($genre);
    }

    public function store(GenreStoreRequest $request)
    {
        $genre = Genre::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
        ]);

        return (new GenreResource($genre))->additional([
            'message' => 'Genre Berhasil Ditambahkan!',
        ]);
    }

    public function show($id)
    {
        $genre = Genre::findOrFail($id);

        return (new GenreResource($genre))->additional([
            'message' => 'Data Berhasil Ditemukan'
        ]);
    }

    public function update(GenreUpdateRequest $request, Genre $genre)
    {
        $genre->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
        ]);

        return (new GenreResource($genre))->additional([
            'message' => 'Data Berhasil di Ubah!'
        ]);
    }

    public function destroy(Genre $genre)
    {
        $genre->delete();

        return response()->json([
            'message' => 'Genre berhasil dihapus!',
        ]);
    }
}
