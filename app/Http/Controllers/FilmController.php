<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Http\Controllers\Controller;
use App\Http\Requests\FilmStoreRequest;
use App\Http\Requests\FilmUpdateRequest;
use App\Http\Resources\FilmResource;

class FilmController extends Controller
{
    public function index()
    {
        $film = Film::with('film_genre')->get();

        return FilmResource::collection($film);
    }

    public function store(FilmStoreRequest $request)
    {
        $film = Film::create([
            'judul' => $request->judul,
            'sinopsis' => $request->sinopsis,
            'tanggal_publish' => $request->tanggal_publish,
            'sutradara' => $request->sutradara,
            'studio' => $request->studio,
        ]);

        return (new FilmResource($film))->additional([
            'message' => 'Film Berhasil Ditambahkan!',
        ]);
    }

    public function show($id)
    {
        $film = Film::findOrFail($id);

        return (new FilmResource($film))->additional([
            'message' => 'Data Berhasil Ditemukan'
        ]);
    }

    public function update(FilmUpdateRequest $request, Film $film)
    {
        $film->update([
            'judul' => $request->judul,
            'sinopsis' => $request->sinopsis,
            'tanggal_publish' => $request->tanggal_publish,
            'sutradara' => $request->sutradara,
            'studio' => $request->studio,
        ]);

        return (new FilmResource($film))->additional([
            'message' => 'Data Berhasil di Ubah!'
        ]);
    }

    public function destroy(Film $film)
    {
        $film->delete();

        return response()->json([
            'message' => 'Film berhasil dihapus!',
        ]);
    }
}
