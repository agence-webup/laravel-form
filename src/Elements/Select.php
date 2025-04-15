<?php

namespace Webup\LaravelForm\Elements;

class Select extends Base
{
    protected $type;
    protected $options = [];

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

        $value = $this->getValue();

        return view('form::select', [
            'placeholder' => $this->placeholder,
            'value' => $this->getValue(),
            'values' => $value ? explode(',', $value) : [],
            'label' => $this->label,
            'required' => $this->required,
            'requiredStar' => $this->requiredStar,
            'name' => $this->name,
            'errors' => $this->errors,
            'type' => $this->type,
            'attr' => $this->attr,
            'options' => $this->options,
            'wrapperClass' => $this->wrapperClass,
            'wrapperAttr' => $this->wrapperAttr,
        ])->render();
    }

    public function addOptions(array $options)
    {
        foreach ($options as $value => $label) {
            $this->options[] = [
                'value' => $value,
                'label' => $label,
            ];
        }

        return $this;
    }

    public function __toString()
    {
        return $this->render();
    }
}
