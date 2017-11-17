<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Category extends Model{
    protected $fillable = ['category_name', 'mainmenu_id'];
}
