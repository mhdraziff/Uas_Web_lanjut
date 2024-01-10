<?php

namespace Database\Seeders;

use App\Models\Music;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MusicSeeder extends Seeder
{
    public function run(): void
    {
        $musics =  [
            [
                'id' => 'tt1103003',
                'judul' => 'Bad Guy',
                'makna' =>
                'Dalam lagu ini, Billie Eilish menggambarkan seseorang yang merasa tidak biasa atau berbeda dari apa yang diharapkan oleh kebanyakan orang.
                 Ia menantang konsep tentang menjadi "bad guy" atau tokoh jahat, mungkin dengan cara menolak norma-norma yang biasa diterima oleh masyarakat.',
                'tahun' => 2019,
                'category_id' => 1,
                'penyanyi' => 'Billie Eilish',
                'foto_sampul' => 'BillieEilishBadGuy.jpg',
            ],
            [
                'id' => 'tt1103004',
                'judul' => 'Redemption Song',
                'makna' =>
                'Lagu ini merupakan lagu yang sangat puitis dan mendalam. Bob Marley menggambarkan tentang
                 pembebasan diri, kemerdekaan, dan kekuatan spiritual manusia. ',
                'tahun' => 1980,
                'category_id' => 3,
                'penyanyi' => 'Bob Marley',
                'foto_sampul' => 'arango54321.jpeg',
            ],
            [
                'id' => 'tt1103005',
                'judul' => 'Smoke on the Water',
                'makna' =>
                'Lirik "Smoke on the Water" menggambarkan gambaran tentang kejadian ini, termasuk baris seperti "Smoke on the water,
                 fire in the sky" yang menggambarkan asap yang membumbung tinggi dari air dan api yang terlihat di langit. ',
                'tahun' => 1972,
                'category_id' => 2,
                'penyanyi' => 'Deep Purple',
                'foto_sampul' => 'deeppurple.jpeg',
            ],
        ];
        foreach ($musics as $music) {
            Music::create([
                'id' => $music['id'],
                'judul' => $music['judul'],
                'makna' => $music['makna'],
                'tahun' => $music['tahun'],
                'category_id' => $music['category_id'],
                'penyanyi' => $music['penyanyi'],
                'foto_sampul' => $music['foto_sampul'],
            ]);
        }
    }
}
