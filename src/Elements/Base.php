<?php

namespace Webup\LaravelForm\Elements;

class Base
{
    protected $label;
    protected $value;
    protected $name;
    protected $placeholder;
    protected $divClass;
    protected $required;

    protected $errors;
    protected $attr;

    public function __construct()
    {
        $this->required = false;
        $this->attr = [];
        $this->errors = [];
    }

    public function label($label = null, $escape = true)
    {
        $label = $escape ? $label : htmlentities($label, ENT_QUOTES, 'UTF-8', false);
        $this->label = $label;

        return $this;
    }

    public function value($value = null)
    {
        $this->value = $value;

        return $this;
    }

    public function placeholder($placeholder = null)
    {
        $this->placeholder = $placeholder;

        return $this;
    }

    public function name($name = null)
    {
        $this->name = $name;

        return $this;
    }

    public function required()
    {
        $this->required = true;

        return $this;
    }

    public function errors($errors = [])
    {
        $this->errors = $errors;

        return $this;
    }

    public function attr(array $attr = [])
    {
        $this->attr = $attr;

        return $this;
    }
}
