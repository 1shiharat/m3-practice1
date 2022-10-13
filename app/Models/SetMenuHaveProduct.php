<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SetMenuHaveProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'set_menu_id'

    ];
}
