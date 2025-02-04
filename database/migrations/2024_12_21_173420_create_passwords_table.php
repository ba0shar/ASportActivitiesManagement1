<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Password;

class CreatePasswordsTable extends Migration
{
    public function up()
    {
        Schema::create('passwords', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // عمود user_id مع علاقة مع جدول المستخدمين
            $table->string('service_name');
            $table->text('encrypted_password');
            $table->string('iv');
            $table->timestamps();
        });

       
    }

    public function down()
    {
        Schema::dropIfExists('passwords');
    }
}
