<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class DataApi extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [
        "id"
    ];

    // Create
    public static function createData($data)
    {
        self::create($data);
    }


    // Read
    public static function getAllData()
    {
        return self::orderBy('updated_at', 'desc')->get();
    }

    public static function getDataById($id)
    {
        $result = self::where('id', $id)->get();
        return $result[0];
    }

    public static function getCountGenreGames()
    {
        return self::select('genre', DB::raw('COUNT(*) as total_games'))
            ->groupBy('genre')
            ->get();
    }

    public static function getCountGamesByYear()
    {
        return self::select(DB::raw('YEAR(release_date) as year'), DB::raw('COUNT(*) as total_games'))
            ->groupBy('year')
            ->orderBy('year', 'asc')
            ->get();
    }

    public static function getCountGamesByPublisher()
    {
        return self::select('publisher', DB::raw('COUNT(*) as total_games'))
            ->groupBy('publisher')
            ->get();
    }


    // Update
    public static function updateData($id, $data)
    {
        self::where('id', $id)->update([
            'title' => $data['title'],
            'genre' => $data['genre'],
            'publisher' => $data['publisher'],
            'publisher' => $data['publisher'],
            'developer' => $data['developer'],
            'release_date' => $data['release_date'],
            'is_edited' => true,
        ]);
    }


    // Delete
    public static function deleteData($id)
    {
        self::where('id', $id)->delete();
    }
}
