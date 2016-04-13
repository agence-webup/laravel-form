<?php

namespace Webup\LaravelForm;

use Webup\LaravelForm\Elements\Base;
use Webup\LaravelForm\Elements\Input;
use Webup\LaravelForm\Elements\Radio;
use Webup\LaravelForm\Elements\Textarea;
use Webup\LaravelForm\Elements\Select;
use Webup\LaravelForm\Elements\Checkbox;
use Exception;

class FormFactory
{
    protected $config;
    protected $errors;
    protected $oldValues;

    public function __construct($config, $values, $errors)
    {
        $this->errors = $errors;
        $this->oldValues = $values;
        $this->config = $config;
    }

    public function create($type, $name)
    {
        $inputTypes = ['text', 'email', 'password', 'file', 'number'];
        $element = null;
        $oldValue = isset($this->oldValues[$name]) ? $this->oldValues[$name] : null;

        if (in_array($type, $inputTypes)) {
            $element = new Input($type, $oldValue);
        } elseif ($type == 'radio') {
            $element = new Radio($type, $oldValue);
        } elseif ($type == 'checkbox') {
            $element = new Checkbox($type, $oldValue);
        } elseif ($type == 'select') {
            $element = new Select($type, $oldValue);
        } elseif ($type == 'textarea') {
            $element = new Textarea($type, $oldValue);
        } else {
            throw new Exception('Invalid form type');
        }

        $errors = [];
        if ($this->errors) {
            $errors = $this->errors->getBag('default')->has($name) ? $this->errors->get($name) : [];
        }

        return $element->name($name)->errors($errors);
    }
}
