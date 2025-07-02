<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('properties', function (Blueprint $table) {
            // Drop old car-related columns
            $table->dropColumn(['model', 'color', 'mileage', 'efficiency', 'price', 'stock']);

            // Add new real-estate columns
            $table->string('property_type');
            $table->string('location');
            $table->text('address');
            $table->integer('number_of_rooms');
            $table->string('furnish_status');
            $table->decimal('monthly_rent', 10, 2);
            // The image_url column can remain as is.
        });
    }

    public function down(): void
    {
        // Logic to revert the changes if you ever need to rollback
        Schema::table('properties', function (Blueprint $table) {
            $table->dropColumn(['property_type', 'location', 'address', 'number_of_rooms', 'furnish_status', 'monthly_rent']);
            $table->string('model');
            $table->string('color')->nullable();
            $table->integer('mileage')->nullable();
            $table->string('efficiency')->nullable();
            $table->decimal('price', 10, 2);
            $table->integer('stock')->default(0);
        });
    }
};
