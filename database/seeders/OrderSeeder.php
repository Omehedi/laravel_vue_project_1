<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order; // Ensure this line is present

class OrderSeeder extends Seeder
{
    public function run()
    {
        // Creating orders based on your provided data
        Order::create([
            'customer_name' => 'John Doe',
            'total' => 250.75,
            'status' => 'Shipped',
        ]);

        Order::create([
            'customer_name' => 'Jane Smith',
            'total' => 150.50,
            'status' => 'Pending',
        ]);

        Order::create([
            'customer_name' => 'Emily Davis',
            'total' => 320.00,
            'status' => 'Delivered',
        ]);

        Order::create([
            'customer_name' => 'David Brown',
            'total' => 120.30,
            'status' => 'Canceled',
        ]);
    }
}
