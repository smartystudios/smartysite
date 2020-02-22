<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\View;

class Form extends Model
{
    private $formAction;
    private $formFields;
    private $formName;
    private $formSubmit;
    private $modelData;
    private $template = 'partials.forms.standard';

    public function __construct($action,$name=null,$submit="Submit",$data=null)
    {
        $this->formName = $name;
        $this->formAction = $action;
        $this->formSubmit = $submit;
        $this->modelData = $data;
    }

    public function addField($title, $type, $name, $options = [])
    {
        $this->formFields[] = ['title'=>$title,'type'=>$type,'name'=>$name,'options'=>$options];
    }

    public function setTemplate($template)
    {
        $this->template = $template;
    }

    public function getFormAction()
    {
        return $this->formAction;
    }

    public function getFormFields()
    {
        return $this->formFields;
    }

    public function getFormName()
    {
        return $this->formName;
    }

    public function getFormSubmit()
    {
        return $this->formSubmit;
    }

    public function getModelData()
    {
        return $this->modelData;
    }

    public function getTemplate()
    {
        return $this->template;
    }

    public function renderForm()
    {
        return View::make($this->getTemplate(),['data'=>$this->getModelData(),'action'=>$this->getFormAction(),'fields'=>$this->getFormFields(),'name'=>$this->getFormName(),'submit'=>$this->getFormSubmit()]);
    }
}
