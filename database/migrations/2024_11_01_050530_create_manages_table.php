<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create the manages table if it doesn't exist
        if (!Schema::hasTable('manages')) {
            Schema::create('manages', function (Blueprint $table) {
                $table->id();
                $table->string('student_id');
                $table->string('name');
                $table->date('leave_start_date');
                $table->date('leave_end_date');
                $table->integer('days')->unsigned();
                $table->date('apply_date');
                $table->enum('status', ['Approved', 'Rejected'])->default('Approved');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('manages');
    }
};
