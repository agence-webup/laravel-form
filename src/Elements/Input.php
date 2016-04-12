<?php

namespace Webup\LaravelForm\Elements;

class Input extends Base
{
    protected $type;

    public function __construct($type)
    {
        parent::__construct();
        $this->type = $type;
    }

    public function render()
    {
        return view(
        'form::input', [
            'placeholder' => $this->placeholder,
            'value' => $this->getValue(),
            'label' => $this->label,
            'required' => $this->required,
            'name' => $this->name,
            'errors' => $this->errors,
            'type' => $this->type,
            'attr' => $this->attr,
            'wrapperClass' => $this->wrapperClass,
        ])->render();
    }

    public function __toString()
    {
        return $this->render();
    }
}
