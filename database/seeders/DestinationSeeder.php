<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Destinations;

class DestinationSeeder extends Seeder
{
    public function run(): void
    {
        Destinations::create([
            'name' => "Alam Mayang",
            'description' => "destinasi rekreasi keluarga terpopuler di Pekanbaru, Riau, yang menawarkan suasana alam asri, rindang, dan sejuk di atas lahan seluas 24-25 hektar",
            'location' => "Jl. Imam Munandar (Lintas Timur), Kelurahan Tengkerang Timur, Kecamatan Tenayan Raya, Kota Pekanbaru, Riau.",
            'working_days' => "WeekEnd",
            'working_hours' => "8AM-5PM",
            'ticket_price' => 20000,
        ]);

        Destinations::create([
            'name' => "Ulu Kasok",
            'description' => "Ulu Kasok awalnya adalah wilayah permukiman di Desa Pulau Gadang, Kecamatan XIII Koto Kampar. Pada 1991, proyek PLTA Koto Panjang menggenangi daerah tersebut, membentuk danau buatan yang kini menjadi pusat wisata. Hanya puncak bukit yang tersisa, menciptakan ilusi pulau-pulau di atas air",
            'location' => "Pulau Gadang, Tj. Alai, Kec. XIII Koto Kampar, Kabupaten Kampar, Riau 28554",
            'working_days' => "WeekEnd",
            'working_hours' => "8AM-5PM",
            'ticket_price' => 10000,
        ]);

        Destinations::create([
            'name' => "Kelok 9",
            'description' => "Kelok 9 adalah jembatan layang ikonik sepanjang 943 meter di Kabupaten Lima Puluh Kota, Sumatera Barat, yang menghubungkan Sumbar-Riau. Terkenal dengan pemandangan perbukitan hijau dan hutan cagar alam yang memukau, tempat ini menjadi destinasi wisata favorit untuk berfoto, menikmati udara segar, dan beristirahat, terutama saat musim mudik",
            'location' => "WMJX+P2P, Harau, Lima Puluh Kota Regency, West Sumatra 26271",
            'working_days' => "WeekEnd",
            'working_hours' => "8AM-7PM",
            'ticket_price' => 1000,
        ]);

        Destinations::create([
            'name' => "Lembah Harau",
            'description' => "Lembah Harau adalah sebuah ngarai dekat Kota Payakumbuh di Kabupaten Lima Puluh Kota, provinsi Sumatera Barat. Lembah Harau diapit dua bukit cadas terjal dengan ketinggian mencapai 150 meter berupa batu pasir yang terjal berwarna-warni, dengan ketinggian 100 sampai 500 meter. Topografi Cagar Alam Harau adalah berbukit-bukit dan bergelombang. Tinggi dari permukaan laut adalah 500 sampai 850 meter, bukit tersebut antara lain adalah Bukit Air Putih, Bukit Jambu, Bukit Singkarak, dan Bukit Tarantang. Berjalan menuju Lembah Harau amat menyenangkan. Dengan udara yang masih segar, anda bisa melihat keindahan alam sekitarnya. Tebing-tebing granit yang menjulang tinggi dengan bentuknya yang unik mengelilingi lembah. Tebing-tebing granit yang terjal ini mempunyai ketinggian 80 meter hingga 300 meter.",
            'location' => "VMP9+RW8, Tarantang, Harau, Lima Puluh Kota Regency, West Sumatra 26271",
            'working_days' => "Every Day",
            'working_hours' => "24 hours",
            'ticket_price' => 10000,
        ]);

        Destinations::create([
            'name' => "Air terjun batu dinding",
            'description' => "Air Terjun Batu Dinding adalah salah satu permata tersembunyi di Kabupaten Kampar, tepatnya berlokasi di Desa Tanjung Belit, Kecamatan Kampar Kiri Hulu, Riau. Air terjun ini berada dalam kawasan penyangga Suaka Margasatwa Rimbang Baling, sehingga keasrian alamnya masih sangat terjaga.",
            'location' => "80km, RW.dari, Tanjung Belit, Kampar Kiri Hulu, Kampar Regency, Riau 28471",
            'working_days' => "Every Day",
            'working_hours' => "9AM-6PM",
            'ticket_price' => 20000,
        ]);
        for ($i = 0; $i <= 100; $i++) {
            Destinations::create([
                'name' => fake("id_ID")->name(),
                'description' => fake("id_ID")->sentence(),
                'location' => fake("id_ID")->address() . ", Pekanbaru, Riau",
                'working_days' => "Every Day",
                'working_hours' =>"8 am - 5 pm",
                'ticket_price' => rand(1000,5000),
            ]);
        }
    }
}