<?php

use Illuminate\Database\Schema;
use Illuminate\Database\Blueprint;

return new class {

    public function up() {

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 30);
            $table->string('birthday');
            $table->string('sex');
            $table->timestamp('created_at');
        });

    }

};
