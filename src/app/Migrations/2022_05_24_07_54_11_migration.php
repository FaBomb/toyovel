<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema;
use Illuminate\Database\Blueprint;

return new class extends Migration {

    public function up() {

        Schema::create('Tests', function (Blueprint $table) {
            $table->id();
            $table->timestamp('created_at');
        });

    }

};
