<?php

namespace Webup\LaravelForm\Elements;

class Checkbox extends Base
{
    protected $type;
    protected $checked;

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

        return view('form::checkbox', [
            'placeholder' => $this->placeholder,
            'value' => $this->value,
            'label' => $this->label,
            'required' => $this->required,
            'requiredStar' => $this->requiredStar,
            'checked' => $this->getChecked(),
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

    public function value($value = null)
    {
        $this->checked = $value;

        return $this;
    }

    private function getChecked()
    {
        return $this->oldValue === null ? $this->checked : $this->oldValue;
    }
}
