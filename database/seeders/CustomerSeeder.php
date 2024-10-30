<?php
// database/seeders/CustomerSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    public function run()
    {
        Customer::create(['name' => 'John Doe', 'email' => 'johndoe@example.com']);
        Customer::create(['name' => 'Jane Smith', 'email' => 'janesmith@example.com']);
        Customer::create(['name' => 'Emily Davis', 'email' => 'emilydavis@example.com']);
        Customer::create(['name' => 'Michael Johnson', 'email' => 'michaelj@example.com']);
        Customer::create(['name' => 'David Brown', 'email' => 'davidbrown@example.com']);
    }
}
