<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = "barangs";

    protected $fillable = ['id_category','code_item','name_item','stock_item','price_item'];
}
