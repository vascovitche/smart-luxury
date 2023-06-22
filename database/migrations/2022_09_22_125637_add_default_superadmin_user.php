<?php

use Illuminate\Database\Migrations\Migration;
use Modules\Admin\Models\Admin;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Admin::create([
            'email' => 'admin@temp.ua',
            'name' => 'Super Admin',
            'password' => bcrypt('123123123'),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Admin::where('email','admin@temp.ua')->delete();
    }
};
