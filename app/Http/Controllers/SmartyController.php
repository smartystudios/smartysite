<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller as BaseController;

class SmartyController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function _construct(){
        $this->addOG('title',env('APP_NAME'));
        $this->addOG('description',env('APP_DESCRIPTION'));
        $this->addStyle('/css/global.css?v='.env('V_CSS'));
        $this->addScript('/js/global.js?v='.env('V_JS'));
    }

    public function frontend()
    {
        $this->_construct();
        $this->addNavigation('partials.navbar.center-md');
        return $this;
    }

    public function backend()
    {
        $this->_construct();
        $this->addNavigation('partials.navbar.center-md',2);
    }
}
