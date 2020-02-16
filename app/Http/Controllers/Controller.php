<?php

namespace App\Http\Controllers;

use App\MenuItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class Controller extends SmartyController
{
    private $title,$meta,$og,$styles,$scripts,$logo,$page_content;

    public function setMaintenance($setting=true){
        View::share('maintenance',$setting);
    }

    public function getTitle(){
        return $this->title;
    }
    public function setTitle($title){
        $this->title = $title." | ".env('APP_NAME');
        View::share('head_title', $this->getTitle());
    }

    public function getMetaDescription(){
        return $this->meta['description'];
    }
    public function setMetaDescription($description){
        $this->meta['description'] = $description;
        View::share('head_meta_description', $this->getMetaDescription());
    }

    public function getMetaRobots(){
        return $this->meta['robots'];
    }
    public function setMetaRobots($description){
        $this->meta['robots'] = $description;
        View::share('head_meta_robots', $this->getMetaRobots());
    }

    public function getOGs(){
        return $this->og;
    }
    public function addOG($name,$content){
        $og['name'] = $name;
        $og['content'] = $content;
        $this->og[] = $og;
        View::share('head_og', $this->getOGs());
    }

    public function getStyles(){
        return $this->styles;
    }
    public function addStyle($path){
        $this->styles[] = $path;
        View::share('head_styles', $this->getStyles());
    }

    public function getScripts(){
        return $this->scripts;
    }
    public function addScript($path){
        $this->scripts[] = $path;
        View::share('head_scripts', $this->getScripts());
    }

    public function getLogo(){
        return $this->logo;
    }
    public function setLogo($file){
        $this->logo = $file;
        View::share('logo', $this->getLogo());
    }

    public function addForm($form){
        $this->page_content[] = $form;
        View::share('page_content', $this->getContent());
    }

    public function getContent(){
        return $this->page_content;
    }

    public function addContent($template,$data=[]){
        $this->page_content[] = View::make($template,$data);
        View::share('page_content', $this->getContent());
    }

    public function addNavigation($template,$menu_id=1){
        $menu_items = MenuItem::with('sub_menu_items')->where('menu',$menu_id)->where('parent',null)->orderBy('sort_order','ASC')->orderBy('id','ASC')->get();
        $this->addContent($template,['menu_items'=>$menu_items]);
    }

    public function render(){
        return view('layouts.global');
    }
}
