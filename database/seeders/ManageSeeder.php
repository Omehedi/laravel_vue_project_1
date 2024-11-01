<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Manage;

class ManageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Manage::create([
            'student_id' => '#R2023536',
            'name' => 'Priviledge Mhlanga',
            'leave_start_date' => '2024-10-31',
            'leave_end_date' => '2024-11-04',
            'days' => 5,
            'apply_date' => '2024-10-31',
            'status' => 'Approved'
        ]);

        // Add more records as needed...
        // Example of additional record
        Manage::create([
            'student_id' => '#1014',
            'name' => 'Rylee Pratt',
            'leave_start_date' => '2024-10-30',
            'leave_end_date' => '2025-10-30',
            'days' => 366,
            'apply_date' => '2024-10-30',
            'status' => 'Rejected'
        ]);

        // Continue adding other Manage::create calls as needed...
    }
}
