<?php

namespace Webup\LaravelForm\Elements;

class Textarea extends Base
{
    protected $type;

    public function __construct($type, $oldValue)
    {
        parent::__construct($oldValue);
        $this->type = $type;
    }

    public function render()
    {
        if (array_key_exists('class', $this->wrapperAttr)) {
            $this->wrapperClass = $this->wrapperAttr['class'] . ' ' . $this->wrapperClass;
            unset($this->wrapperAttr['class']);
        }

        return view('form::textarea', [
            'placeholder' => $this->placeholder,
            'value' => $this->getValue(),
            'label' => $this->label,
            'required' => $this->required,
            'requiredStar' => $this->requiredStar,
            'name' => $this->name,
            'errors' => $this->errors,
            'type' => $this->type,
            'attr' => $this->attr,
            'wrapperClass' => $this->wrapperClass,
            'wrapperAttr' => $this->wrapperAttr,
        ])->render();
    }

    public function __toString()
    {
        return $this->render();
    }
}
