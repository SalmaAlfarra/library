<?php

use App\Models\Publisher;
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
        Schema::table('books', function (Blueprint $table) {
            //
            // $table->foreignId('publisher_id')->after('name');
            // $table->foreignIdFor(Publisher::class);

            // $table->foreignId('publisher_id')->after('name');
            // $table->foreign('publisher_id')->on('publishers')->references('id');

            // $table->foreignId('publisher_id')->constrained();
            $table->foreignIdFor(Publisher::class)->after('name')->constrained();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            //
            $table->dropForeign('books_publisher_id_foreign');
            $table->dropColumn('publisher_id');

        });
    }
};