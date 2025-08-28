<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('first_name')->nullable()->after('id');
            $table->string('last_name')->nullable()->after('first_name');
            $table->string('phone')->nullable()->after('email');
            $table->unsignedTinyInteger('gender')->nullable()->after('phone'); // 1=male,2=female,3=other
            $table->date('date_of_birth')->nullable()->after('gender');
            $table->string('icon_path')->nullable()->after('date_of_birth');
            $table->text('address')->nullable()->after('icon_path');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['first_name','last_name','phone','gender','date_of_birth','icon_path','address']);
        });
    }
};


