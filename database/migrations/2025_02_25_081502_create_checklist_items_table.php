<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('checklist_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('checklist_id');
            $table->string('name');
            $table->boolean('is_completed')->default(false);
            $table->timestamps();
            $table->foreign('checklist_id')->references('id')->on('checklists')->onDelete('cascade');
        });
    }

    public function down() {
        Schema::dropIfExists('checklist_items');
    }
};
