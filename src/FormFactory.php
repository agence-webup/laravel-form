<?php

namespace Webup\LaravelForm;

use Illuminate\Http\Request;
use Webup\LaravelForm\Elements\Base;
use Webup\LaravelForm\Elements\Input;
use Webup\LaravelForm\Elements\Radio;
use Webup\LaravelForm\Elements\Textarea;
use Webup\LaravelForm\Elements\Select;
use Webup\LaravelForm\Elements\Checkbox;
use Illuminate\Contracts\Config\Repository as Config;
use Exception;

class FormFactory
{
    protected $config;
    protected $errors;
    protected $oldValues;

    public function __construct(Config $config, Request $request)
    {
        $this->errors = $request->session()->get('errors');
        $this->oldValues = $request->session()->get('_old_input');
        $this->config = $config->get('form');
    }

    public function create($type, $name)
    {
        $inputTypes = ['text', 'email', 'password', 'file', 'number'];

        if (in_array($type, $inputTypes)) {
            return $this->initElement(new Input($type), $name);
        } elseif ($type == 'radio') {
            return $this->initElement(new Radio($type), $name);
        } elseif ($type == 'checkbox') {
            return $this->initElement(new Checkbox($type), $name);
        } elseif ($type == 'select') {
            return $this->initElement(new Select($type), $name);
        } elseif ($type == 'textarea') {
            return $this->initElement(new Textarea($type), $name);
        } else {
            throw new Exception('Invalid form type');
        }
    }

    private function initElement(Base $input, $name)
    {
        if ($this->errors) {
            $errors = $this->errors->getBag('default')->has($name) ? $this->errors->get($name) : [];
        } else {
            $errors = [];
        }
        if (isset($this->oldValues[$name])) {
            $value = $this->oldValues[$name];
        } else {
            $value = null;
        }

        return $input->value($value)->errors($errors)->name($name);
    }
}
