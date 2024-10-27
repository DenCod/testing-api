<?php

namespace App\Console\Commands;

use App\Models\ApiData;
use App\Models\DataApi;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class ConsumeApiData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'api:consume';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        // Panggil API Public
        $response = Http::get('https://www.freetogame.com/api/games');
        $data = $response->json();


        foreach ($data as $item) {
            $title = $item['title'];
            $genre = $item['genre'];
            $publisher = $item['publisher'];
            $developer = $item['developer'];
            $release_date = $item['release_date'];

            // Validasi tanggal sebelum menyimpan
            if (!$this->isValidDate($release_date)) {
                $this->info("Tanggal tidak valid: $release_date, melewati entri ini.");
                continue; // Lewati ke item berikutnya
            }

            // Cari data berdasarkan kombinasi unik (nama + kategori), kecuali data manual
            $existing = DataApi::withTrashed()
                ->where('title', $title)
                ->where('genre', $genre)
                ->where('is_manual', false) // Abaikan data manual
                ->first();

            if ($existing) {
                if (!$existing->edited) {
                    $this->info("Data $title sudah ada dan tidak diubah, lewati.");
                }
            } else {
                // Simpan data baru dari API
                DataApi::create([
                    'title' => $title,
                    'genre' => $genre,
                    'publisher' => $publisher,
                    'developer' => $developer,
                    'release_date' => $release_date,
                    'is_manual' => false, // Data dari API
                    'is_edited' => false, // Data dari API
                ]);
                $this->info("Data $title berhasil ditambahkan.");
            }
        }
    }

    private function isValidDate($date)
    {
        $d = \DateTime::createFromFormat('Y-m-d', $date);
        return $d && $d->format('Y-m-d') === $date;
    }
}
