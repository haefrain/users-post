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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('companyId')->constrained('company')->comment('Relation with company');
            $table->foreignId('addressId')->constrained('address')->comment('Relation with address');
            $table->string('name', 100)->comment('Name of user');
            $table->string('username', 50)->unique()->comment('Username unique identify intern');
            $table->string('email', 150)->unique()->comment('email of user');
            $table->string('phone', 50)->comment('Phone to contact user');
            $table->string('website', 150)->comment('Personal website of user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
