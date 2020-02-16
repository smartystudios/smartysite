<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    public function sub_menu_items()
    {
        return $this->hasMany('App\MenuItem','parent');
    }
}
