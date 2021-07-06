<?php

namespace Webup\LaravelForm;

use Illuminate\Support\Arr;
use Webup\LaravelForm\Elements\Input;
use Webup\LaravelForm\Elements\Radio;
use Webup\LaravelForm\Elements\Textarea;
use Webup\LaravelForm\Elements\Select;
use Webup\LaravelForm\Elements\Checkbox;
use Webup\LaravelForm\Elements\HoneyPot;
use Webup\LaravelForm\Elements\TimeTrap;

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
        $inputTypes = [
                        'text',
                        'email',
                        'password',
                        'file',
                        'number',
                        'color',
                        'date',
                        'range',
                        'tel',
                        'url',
        ];
        $element = null;
        $oldValue = null;
        $dottedKey = $this->nameToDottedKey($name);
        if (isset($this->oldValues[$name])) {
            $oldValue = $this->oldValues[$name];
        } elseif (Arr::has($this->oldValues, $dottedKey)) {
            $oldValue = Arr::get($this->oldValues, $dottedKey);
        }

        if (in_array($type, $inputTypes)) {
            $element = new Input($type, $oldValue);
        } elseif ($type == 'radio') {
            $element = new Radio($type, $oldValue);
        } elseif ($type == 'checkbox') {
            $oldValue = $this->oldValues === null ? null : isset($this->oldValues[$name]);
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
            if ($this->errors->getBag('default')->has($name)) {
                $errors = $this->errors->get($name);
            } elseif ($this->errors->getBag('default')->has($dottedKey)) {
                $errors = $this->errors->get($dottedKey);
            }
        }

        return $element->name($name)->errors($errors);
    }

    public function honeypot($name)
    {
        $errors = [];
        if ($this->errors) {
            $errors = $this->errors->getBag('default')->has($name) ? $this->errors->get($name) : [];
        }
        return (new HoneyPot($name))->errors($errors);
    }

    public function timetrap($name)
    {
        $errors = [];
        if ($this->errors) {
            $errors = $this->errors->getBag('default')->has($name) ? $this->errors->get($name) : [];
        }
        return (new TimeTrap($name))->errors($errors);
    }

    private function nameToDottedKey($name)
    {
        $key = str_replace('[', '.', $name);
        $key = str_replace(']', '', $key);

        return trim($key, '.');
    }
}
