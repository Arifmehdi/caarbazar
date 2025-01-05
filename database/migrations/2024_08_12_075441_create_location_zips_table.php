<?php

use App\Models\LocationCity;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('location_zips', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(LocationCity::class)->constrained()->cascadeOnDelete()->nullable();
            $table->decimal('latitude', 10, 5)->unique()->nullable();
            $table->decimal('longitude', 11, 5)->unique()->nullable();
            $table->string('zip_code');
            $table->boolean('status')->default(0);
            $table->boolean('is_read')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('location_zips');
    }
};
