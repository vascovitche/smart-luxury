<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('languages', function (Blueprint $table) {
            $table->string('code', 3)->unique();
            $table->string('name');
        });

        $this->seedLanguages();
    }

    private function seedLanguages()
    {
        $languages = [
            ['code' => 'ru', 'name' => 'Русский'],
            ['code' => 'en', 'name' => 'English'],
            ['code' => 'sp', 'name' => 'Српски'],
            ['code' => 'de', 'name' => 'Deutsch'],
        ];

        DB::table('languages')->insert($languages);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('languages');
    }
};
