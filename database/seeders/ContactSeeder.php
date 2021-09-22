<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contact::truncate();

        for ($i=1; $i < 21; $i++) {
            Contact::create([
                'name' => 'Pepe'.$i,
                'lastname' => 'Perez'.$i,
                'message' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Blanditiis similique fugiat consequatur deserunt eos sed numquam amet. Aliquam, et. Totam quae temporibus, nulla unde consequuntur quam aliquid neque. Iste, placeat.',
                'email' => 'mail_'.$i.'@gmail.com',
            ]);
        }
    }
}
