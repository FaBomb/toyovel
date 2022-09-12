<?php

use Illuminate\Database\Schema;
use Illuminate\Database\Blueprint;

return new class {

    public function up() {

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->timestamp('created_at');
        });

    }

};
