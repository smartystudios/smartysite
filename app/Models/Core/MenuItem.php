<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    public function sub_menu_items()
    {
        return $this->hasMany('App\Models\Core\MenuItem','parent');
    }
}
