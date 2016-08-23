<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class)
        $this->call('Alakkad\WorldCountriesCities\CitiesSeeder');
        $this->call('Alakkad\WorldCountriesCities\CountriesSeeder');

        DB::table('roles')->insert([
            ['role' => 'client'],
            ['role' => 'agent'],
            ['role' => 'admin']
        ]);
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
            'role_id' => 3
        ]);
        DB::table('ports')->insert([
            ['port' => 'Tanger Med', 'country_code' => 'Mar', 'city_id' => 13 ],
            ['port' => 'Agadir', 'country_code' => 'Mar', 'city_id' => 13 ],
            ['port' => 'Ankara P', 'country_code' => 'Mar', 'city_id' => 13 ],
            ['port' => 'Paries Port', 'country_code' => 'Mar', 'city_id' => 13 ],
        ]);
        DB::table('clients')->insert([['name' => 'client 1', 'social_reason' => 'raison 1', 'type_client' => 'type 1', 'city_id' => 12, 'country_code' => 'MAR', 'address' => 'address 1', 'phone' => '0697852133', 'fax' => '', 'web_site' => 'google.com', 'tax_id' => 'taxt', 'email' => 'client1@host.com'],
            ['name' => 'client 2', 'social_reason' => 'raison 2', 'type_client' => 'type 1', 'city_id' => 30, 'country_code' => 'MAR', 'address' => 'address 2', 'phone' => '0697852133', 'fax' => '', 'web_site' => 'quora.com', 'tax_id' => 'taxt', 'email' => 'client2@host.com'],
            ['name' => 'client 3', 'social_reason' => 'raison 3', 'type_client' => 'type 1', 'city_id' => 70, 'country_code' => 'MAR', 'address' => 'address 3', 'phone' => '0697852133', 'fax' => '', 'web_site' => 'facebook.com', 'tax_id' => 'taxt', 'email' => 'client1@host.com']]);
        DB::table('providers')->insert([['name' => 'provider 1', 'social_reason' => 'raison 1', 'type_provider' => 'type 1', 'city_id' => 12, 'country_code' => 'MAR', 'address' => 'address 1', 'phone' => '0697852133', 'fax' => '', 'web_site' => 'google.com', 'tax_id' => 'taxt', 'email' => 'provider1@host.com'],
            ['name' => 'provider 2', 'social_reason' => 'raison 2', 'type_provider' => 'type 1', 'city_id' => 30, 'country_code' => 'MAR', 'address' => 'address 2', 'phone' => '0697852133', 'fax' => '', 'web_site' => 'quora.com', 'tax_id' => 'taxt', 'email' => 'provider2@host.com'],
            ['name' => 'provider 3', 'social_reason' => 'raison 3', 'type_provider' => 'type 1', 'city_id' => 70, 'country_code' => 'MAR', 'address' => 'address 3', 'phone' => '0697852133', 'fax' => '', 'web_site' => 'facebook.com', 'tax_id' => 'taxt', 'email' => 'provider3@host.com']]);
        DB::table('depots')->insert([['name' => 'depot 1', 'social_reason' => 'raison 1', 'type' => 'IN PORT', 'city_id' => 12, 'address' => 'address 1', 'phone' => '0697852133', 'tax_id' => 'taxt'],
            ['name' => 'depot 2', 'social_reason' => 'raison 2', 'type' => 'IN PORT', 'city_id' => 30, 'address' => 'address 2', 'phone' => '0697852133', 'tax_id' => 'taxt'],
            ['name' => 'depot 3', 'social_reason' => 'raison 3', 'type' => 'OUT PORT', 'city_id' => 70, 'address' => 'address 3', 'phone' => '0697852133', 'tax_id' => 'taxt']]);
        DB::table('contacts')->insert([['pic' => str_random(5), 'job' => 'job1', 'direct_phone' => '+21261020304050', 'mobil1' => '061020304050', 'mobil2' => '061020304050', 'email' => 'client1@host.com', 'client_id' => 1],
            ['pic' => str_random(5), 'job' => 'job2', 'direct_phone' => '+21261020304050', 'mobil1' => '061020304050', 'mobil2' => '061020304050', 'email' => 'client2@host.com', 'client_id' => 2],
            ['pic' => str_random(5), 'job' => 'job3', 'direct_phone' => '+21281020304050', 'mobil1' => '081020304050', 'mobil2' => '081020304050', 'email' => 'client3@host.com', 'client_id' => 3]]);
        DB::table('contacts')->insert([
            ['pic' => str_random(5), 'job' => 'job1', 'direct_phone' => '+21261020304050', 'mobil1' => '061020304050', 'mobil2' => '061020304050', 'email' => 'provider1@host.com', 'provider_id' => 1],
            ['pic' => str_random(5), 'job' => 'job2', 'direct_phone' => '+21261020304050', 'mobil1' => '061020304050', 'mobil2' => '061020304050', 'email' => 'provider2@host.com', 'provider_id' => 2],
            ['pic' => str_random(5), 'job' => 'job3', 'direct_phone' => '+21281020304050', 'mobil1' => '081020304050', 'mobil2' => '081020304050', 'email' => 'provider3@host.com', 'provider_id' => 3]]);
        DB::table('contacts')->insert([
            ['pic' => str_random(5), 'job' => 'job1', 'direct_phone' => '+21261020304050', 'mobil1' => '061020304050', 'mobil2' => '061020304050', 'email' => 'depot1@host.com', 'depot_id' => 1],
            ['pic' => str_random(5), 'job' => 'job2', 'direct_phone' => '+21261020304050', 'mobil1' => '061020304050', 'mobil2' => '061020304050', 'email' => 'depot2@host.com', 'depot_id' => 2],
            ['pic' => str_random(5), 'job' => 'job3', 'direct_phone' => '+21281020304050', 'mobil1' => '081020304050', 'mobil2' => '081020304050', 'email' => 'depot3@host.com', 'depot_id' => 3]]);
        DB::table('payments')->insert([
            ['bank_account_n' => '123456789', 'bank' => 'bank 1', 'swift' => 'swift 1', 'payment_conditions' => 'conditions 1', 'address_invoices' => 'address 1', 'client_id' => 1],
            ['bank_account_n' => '123456789', 'bank' => 'bank 2', 'swift' => 'swift 2', 'payment_conditions' => 'conditions 2', 'address_invoices' => 'address 2', 'client_id' => 2],
            ['bank_account_n' => '123456789', 'bank' => 'bank 3', 'swift' => 'swift 3', 'payment_conditions' => 'conditions 3', 'address_invoices' => 'address 3', 'client_id' => 3]]);
        DB::table('payments')->insert([
            ['bank_account_n' => '123456789', 'bank' => 'bank 1', 'swift' => 'swift 1', 'payment_conditions' => 'conditions 1', 'address_invoices' => 'address 1', 'provider_id' => 1],
            ['bank_account_n' => '123456789', 'bank' => 'bank 2', 'swift' => 'swift 2', 'payment_conditions' => 'conditions 2', 'address_invoices' => 'address 2', 'provider_id' => 2],
            ['bank_account_n' => '123456789', 'bank' => 'bank 3', 'swift' => 'swift 3', 'payment_conditions' => 'conditions 3', 'address_invoices' => 'address 3', 'provider_id' => 3]]);
        DB::table('payments')->insert([
            ['bank_account_n' => '123456789', 'bank' => 'bank 1', 'swift' => 'swift 1', 'payment_conditions' => 'conditions 1', 'address_invoices' => 'address 1', 'depot_id' => 1],
            ['bank_account_n' => '123456789', 'bank' => 'bank 2', 'swift' => 'swift 2', 'payment_conditions' => 'conditions 2', 'address_invoices' => 'address 2', 'depot_id' => 2],
            ['bank_account_n' => '123456789', 'bank' => 'bank 3', 'swift' => 'swift 3', 'payment_conditions' => 'conditions 3', 'address_invoices' => 'address 3', 'depot_id' => 3]]);
        DB::table('contracts')->insert([['reference' => 'cont-192', 'client_id'=>1,'type' => 'RENT', 'date_on' => date('yy-mm-dd'), 'date_off' => date('yy-mm-dd')],
            ['reference' => 'cont-360', 'client_id'=>1,'type' => 'RENT', 'date_on' => date('yy-mm-dd'), 'date_off' => date('yy-mm-dd')],
            ['reference' => 'cont-950', 'client_id'=>2,'type' => 'OWNED', 'date_on' => date('yy-mm-dd'), 'date_off' => date('yy-mm-dd')]]);
        DB::table('type_containers')->insert([
            ['code' => 'BLK'], ['code' => 'DV'], ['code' => 'FLT'], ['code' => 'FR'], ['code' => 'GP'], ['code' => 'HC'],
            ['code' => 'HH'], ['code' => 'HT'], ['code' => 'OS'], ['code' => 'OT'], ['code' => 'RF'], ['code' => 'RH'],
            ['code' => 'TK'], ['code' => 'VF']
        ]);
        DB::table('containers')->insert([['prefix' => 'cont-12', 'provider_id' => 1, 'type' => 'DV', 'contract_id' => 1],
            ['prefix' => 'cont-d6', 'provider_id' => 2, 'type' => 'FLT', 'contract_id' => 2],
            ['prefix' => 'cont-3a', 'provider_id' => 3, 'type' => 'OT', 'contract_id' => 3]]);
        DB::table('vessels')->insert([['vessel' => 'vessel 12', 'type' => 'v 12', 'flag' => 'MC', 'class' => '123'],
            ['vessel' => 'vessel 5120', 'type' => 'v 22', 'flag' => 'MC', 'class' => '123'],
            ['vessel' => 'vessel d5', 'type' => 'v 32', 'flag' => 'MC', 'class' => '123']]);
        DB::table('travels')->insert([['number' => 1235, 'vessel_id' => 1,'date_enter' => date('yy-mm-dd'), 'port_id' => 1],
            ['number' => 945, 'vessel_id' => 2, 'date_enter' => date('yy-mm-dd'), 'port_id' => 2],
            ['number' => 637, 'vessel_id' => 3, 'date_enter' => date('yy-mm-dd'), 'port_id' => 1]]);


        $contracts = [];
        for($i = 1; $i < 20; $i++){
            $r = str_random(3) . ' - ' . random_int(1, 13);
            $contracts[$i] = ['reference' => $r, 'client_id'=>random_int(1, 3),'type' => 'RENT', 'date_on' => date('Y-m-d'), 'date_off' => date('Y-m-d')];
        }

        DB::table('contracts')->insert($contracts);

        $containers = [];
        for($i = 1; $i < 100; $i++){
            $r = str_random(3) . ' - ' . random_int(1, 13);
            $types = [
                ['code' => 'BLK'], ['code' => 'DV'], ['code' => 'FLT'], ['code' => 'FR'], ['code' => 'GP'], ['code' => 'HC'],
                ['code' => 'HH'], ['code' => 'HT'], ['code' => 'OS'], ['code' => 'OT'], ['code' => 'RF'], ['code' => 'RH'],
                ['code' => 'TK'], ['code' => 'VF']
            ];
            $type = $types[random_int(0,12)]['code'];
            $containers[$i] = ['prefix' => $r, 'provider_id' => random_int(1,3), 'type' => $type,
                'contract_id' => random_int(5, 13), 'last_survey' => date('Y-m-d'), 'date_pick_up' => date('Y-m-d')];
        }
        DB::table('containers')->insert($containers);

    }
}
