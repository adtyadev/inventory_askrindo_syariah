<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = "transaksis";

    protected $fillable = ['id_item','code_transaction','amount_of_items','total_transaction','date_of_transaction'];
}
