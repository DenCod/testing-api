<?php

namespace App\Http\Controllers;

use App\Models\DataApi;
use Illuminate\Http\Request;

class DataApiController extends Controller
{
    public function dashboard()
    {
        $genres = DataApi::getCountGenreGames();
        $release = DataApi::getCountGamesByYear();
        $publisher = DataApi::getCountGamesByPublisher();

        // Ubah data ke dalam format yang bisa digunakan di Chart.js
        $labels = $genres->pluck('genre')->toArray();
        $data = $genres->pluck('total_games')->toArray();

        // Ubah data ke dalam format yang bisa digunakan di Chart.js
        $yearLabels = $release->pluck('year')->toArray();
        $yearData = $release->pluck('total_games')->toArray();

        // Ubah data ke dalam format yang bisa digunakan di Chart.js
        $publisherLabels = $publisher->pluck('publisher')->toArray();
        $publisherData = $publisher->pluck('total_games')->toArray();

        return view('dashboard', [
            "labelsGenre" => $labels,
            "dataGenre" => $data,
            "releaseLebels" => $yearLabels,
            "releaseData" => $yearData,
            "publisherLebels" => $publisherLabels,
            "publisherData" => $publisherData,
        ]);
    }

    public function managementData()
    {
        return view('management-data', [
            "allData" => DataApi::getAllData()
        ]);
    }

    public function addData()
    {
        return view('add-data', []);
    }

    public function saveData(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'genre' => 'required',
            'publisher' => 'required',
            'developer' => 'required',
            'release_date' => 'required',
        ]);

        $validatedData['is_manual'] = 1;
        $validatedData['is_edited'] = 0;

        DataApi::createData($validatedData);

        // dd($validatedData);
        return redirect('/management-data');
    }

    public function editData($id)
    {
        return view('edit-data', [
            "data" => DataApi::getDataById($id)
        ]);
    }

    public function updateData(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'genre' => 'required',
            'publisher' => 'required',
            'developer' => 'required',
            'release_date' => 'required',
        ]);

        DataApi::updateData($request->id, $validatedData);

        return redirect('/management-data');
    }

    public function deleteData($id)
    {
        DataApi::deleteData($id);

        return redirect('/management-data');
    }
}
