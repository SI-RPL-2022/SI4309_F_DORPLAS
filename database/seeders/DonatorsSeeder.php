<?php

namespace Database\Seeders;

use App\Models\Donators;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;

class DonatorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Donators::factory(5)->create();

        Donators::create([
            'id_donators' => Uuid::uuid4()->toString() . "\n",
            'name_donators' => 'Muhammad Rezki Ananda',
            'email_donators' => 'muhammad.rezki.ananda@gmail.com',
            'password_donators' => Hash::make(12345),
            'gender_donators' => 'male',
            'blood_type_donators' => 'O',
            'rhesus_type_donators' => 'positive',
            'contact_donators' => '085608845319',
            'address_donators' => 'Jl.Kediri Raya Weeh, Jawa Timur',
            'point_donators' => mt_rand(0, 100)
        ]);
        
        Donators::create([
            'id_donators' => Uuid::uuid4()->toString() . "\n",
            'name_donators' => 'Farhan Bani Ahnaf',
            'email_donators' => 'farhanahnaf895@gmail.com',
            'password_donators' => Hash::make(12345),
            'gender_donators' => 'male',
            'blood_type_donators' => 'O',
            'rhesus_type_donators' => 'positive',
            'contact_donators' => '081210278617',
            'address_donators' => 'Jl. Jombang Raya No.38A, Pondok Kacang Timur, Pondok Aren, Tangerang Selatan',
            'point_donators' => mt_rand(0, 100)
        ]);

        Donators::create([
            'id_donators' => Uuid::uuid4()->toString() . "\n",
            'name_donators' => 'Muhammad Syamaidzar Al Ghifari',
            'email_donators' => 'syamaidzaaar@gmail.com',
            'password_donators' => Hash::make(12345),
            'gender_donators' => 'male',
            'blood_type_donators' => 'B',
            'rhesus_type_donators' => 'positive',
            'contact_donators' => '081284087732',
            'address_donators' => 'Jl.Malaka Raya, Jakarta Timur',
            'point_donators' => mt_rand(0, 100)
        ]);
    }
}
