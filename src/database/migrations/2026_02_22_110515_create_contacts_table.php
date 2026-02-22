<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    public function up(): void
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('categry_id')->constrained('categories');
            $table->string('first_name', 255);
            $table->string('last_name', 255);
            $table->tinyInteger('gender')->comment('1:男性 2:女性 3:その他');
            $table->string('email', 255);
            $table->string('tel', 255);
            $table->string('address', 255);
            $table->string('building', 255)->nullable();
            $table->text('detail');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->dropForeign(['categry_id']);
        });

        Schema::dropIfExists('contacts');
    }
};
