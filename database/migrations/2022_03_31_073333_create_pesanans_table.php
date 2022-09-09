<?php

use App\Models\Fotografer;
use App\Models\User;
use App\Models\Pricelist;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->datetime('time_from')->nullable();
            $table->text('catatan_tambahan');
            $table->text('alamat');
            $table->string('no_hp');
            $table->tinyInteger('status')->default(0);;
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Pricelist::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Fotografer::class)->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index(['deleted_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesanans');
    }
}
