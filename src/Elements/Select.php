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
        return view(
        'form::select', [
            'placeholder' => $this->placeholder,
            'value' => $this->getValue(),
            'values' => explode(',', $this->getValue()),
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
