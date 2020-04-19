<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePanniersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    protected $primaryKey = 'pannier_id';
    public function up()
    {
        Schema::create('panniers', function (Blueprint $table) {
            $table->bigIncrements('pannier_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('produit_id');
            $table->bigInteger('quantite');
            $table->float('somme', 8, 2)->default(0);
            $table->timestamps();
            $table->dropPrimary('pannier_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('panniers');
    }
}
