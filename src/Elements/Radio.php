<?php

namespace Webup\LaravelForm\Elements;

class Radio extends Base
{
    protected $type;
    protected $radios = [];

    public function __construct($type, $oldValue)
    {
        parent::__construct($oldValue);
        $this->type = $type;
    }

    public function render()
    {
        return view(
        'form::radio', [
            'value' => $this->getValue(),
            'label' => $this->label,
            'required' => $this->required,
            'name' => $this->name,
            'errors' => $this->errors,
            'type' => $this->type,
            'attr' => $this->attr,
            'radios' => $this->radios,
            'wrapperClass' => $this->wrapperClass,
        ])->render();
    }

    public function addRadio($value, $label = false, $id = null, $attr = [])
    {
        $id = is_null($id) ? $label : $id;
        $this->radios[] = [
            'label' => $label,
            'value' => $value,
            'id' => $id,
            'attr' => $attr,
        ];

        return $this;
    }

    public function __toString()
    {
        return $this->render();
    }
}
