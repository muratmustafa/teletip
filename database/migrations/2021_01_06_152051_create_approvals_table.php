<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApprovalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('approvals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('room_id')->unique();
            $table->boolean('user_approval')->default(0);
            $table->string('parent_degree');
            $table->string('parent_name');
            $table->boolean('parent_approval')->default(0);
            $table->string('other_parent_degree')->nullable();
            $table->string('other_parent_name')->nullable();
            $table->boolean('other_parent_approval')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('approvals');
    }
}
