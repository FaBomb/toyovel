<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema;
use Illuminate\Database\Blueprint;

return new class extends Migration {

    public function up() {

        Schema::create('nunokawas', function (Blueprint $table) {
            $table->id();
            $table->string('yamada', 30);
            $table->string('toyomi', 30);
            $table->timestamp('created_at');
        });

    }

};
