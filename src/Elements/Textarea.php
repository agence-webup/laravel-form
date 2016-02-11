<?php

namespace Webup\LaravelForm\Elements;

class Textarea extends Base
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
        'form::textarea', [
            'placeholder' => $this->placeholder,
            'value' => $this->value,
            'label' => $this->label,
            'required' => $this->required,
            'name' => $this->name,
            'errors' => $this->errors,
            'type' => $this->type,
            'attr' => $this->attr,
        ])->render();
    }

    public function __toString()
    {
        return $this->render();
    }
}
