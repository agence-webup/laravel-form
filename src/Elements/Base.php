<?php

namespace Webup\LaravelForm\Elements;

class Base
{
    protected $label;
    protected $oldValue;
    protected $value;
    protected $name;
    protected $placeholder;
    protected $divClass;
    protected $required;
    protected $requiredStar;
    protected $wrapperClass;
    protected $wrapperAttr;

    protected $errors;
    protected $attr;

    public function __construct($oldValue)
    {
        $this->required = false;
        $this->requiredStar = false;
        $this->attr = [];
        $this->wrapperAttr = [];
        $this->errors = [];
        $this->oldValue = $oldValue;
    }

    public function label($label = null, $escape = false)
    {
        $label = $escape ? htmlentities($label, ENT_QUOTES, 'UTF-8', false) : $label;
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

    public function required($requiredStar = true)
    {
        $this->required = true;
        $this->requiredStar = $requiredStar;

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

    public function wrapperClass($wrapperClass)
    {
        $this->wrapperClass = $wrapperClass;

        return $this;
    }

    public function wrapperAttr(array $attr = [])
    {
        $this->wrapperAttr = $attr;

        return $this;
    }

    protected function getValue()
    {
        return $this->oldValue !== null ? $this->oldValue : $this->value;
    }
}
