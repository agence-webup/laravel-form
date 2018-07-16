<?php

namespace Webup\LaravelForm\Elements;

class HoneyPot
{
    protected $name;
    protected $errors;

    public function __construct($name)
    {
        $this->name = $name;
        $this->errors = [];
    }

    public function render()
    {
        return view('form::honeypot', [
            'name' => $this->name,
            'errors' => $this->errors,
            ])->render();
    }

    public function errors($errors = [])
    {
        $this->errors = $errors;

        return $this;
    }

    public function __toString()
    {
        return $this->render();
    }

    public function checkHoneypot($attribute, $value, $parameters)
    {
        return $value == '';
    }
}
