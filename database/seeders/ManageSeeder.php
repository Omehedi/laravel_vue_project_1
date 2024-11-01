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

        Manage::create([
            'student_id' => '#1014',
            'name' => 'Rylee Pratt',
            'leave_start_date' => '2024-10-30',
            'leave_end_date' => '2025-10-30',
            'days' => 366,
            'apply_date' => '2024-10-30',
            'status' => 'Rejected'
        ]);

        Manage::create([
            'student_id' => '#2021',
            'name' => 'Jordan Smith',
            'leave_start_date' => '2024-11-01',
            'leave_end_date' => '2024-11-03',
            'days' => 3,
            'apply_date' => '2024-10-31',
            'status' => 'Approved'
        ]);

        Manage::create([
            'student_id' => '#3042',
            'name' => 'Taylor White',
            'leave_start_date' => '2024-11-05',
            'leave_end_date' => '2024-11-06',
            'days' => 2,
            'apply_date' => '2024-11-01',
            'status' => 'Approved'
        ]);

        Manage::create([
            'student_id' => '#5563',
            'name' => 'Morgan Lee',
            'leave_start_date' => '2024-11-07',
            'leave_end_date' => '2024-11-08',
            'days' => 2,
            'apply_date' => '2024-11-02',
            'status' => 'Approved'
        ]);

        Manage::create([
            'student_id' => '#6789',
            'name' => 'Jamie Kim',
            'leave_start_date' => '2024-11-09',
            'leave_end_date' => '2024-11-12',
            'days' => 4,
            'apply_date' => '2024-11-03',
            'status' => 'Rejected'
        ]);

        Manage::create([
            'student_id' => '#7890',
            'name' => 'Chris Brown',
            'leave_start_date' => '2024-11-10',
            'leave_end_date' => '2024-11-15',
            'days' => 6,
            'apply_date' => '2024-11-04',
            'status' => 'Rejected'
        ]);

        Manage::create([
            'student_id' => '#8932',
            'name' => 'Alex Johnson',
            'leave_start_date' => '2024-11-11',
            'leave_end_date' => '2024-11-16',
            'days' => 6,
            'apply_date' => '2024-11-05',
            'status' => 'Approved'
        ]);

        Manage::create([
            'student_id' => '#9074',
            'name' => 'Casey Taylor',
            'leave_start_date' => '2024-11-12',
            'leave_end_date' => '2024-11-17',
            'days' => 6,
            'apply_date' => '2024-11-06',
            'status' => 'Rejected'
        ]);

        Manage::create([
            'student_id' => '#1024',
            'name' => 'Pat Morgan',
            'leave_start_date' => '2024-11-13',
            'leave_end_date' => '2024-11-18',
            'days' => 6,
            'apply_date' => '2024-11-07',
            'status' => 'Approved'
        ]);



        // Continue adding other Manage::create calls as needed...
    }
}
