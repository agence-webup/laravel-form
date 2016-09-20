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
            'label' => $this->label,
            'required' => $this->required,
            'name' => $this->name,
            'errors' => $this->errors,
            'type' => $this->type,
            'attr' => $this->attr,
            'options' => $this->options,
            'wrapperClass' => $this->wrapperClass,
        ])->render();
    }

    public function addOptions(array $options)
    {
        foreach ($options as $value => $label) {
            if (is_array($label)) {
                $this->addOptionGroup($value, $label);
            } else {
                $this->addOption($value, $label);
            }
        }
        return $this;
    }

    private function addOptionGroup($title, $label)
    {
        foreach ($label as $key => $value) {
            $this->addOption($key, $value, $title);
        }
    }

    private function addOption($value, $label, $group = null)
    {
        if ($group != null) {
            if (!isset($this->options[$group])) {
                $this->options[$group] = [];
            }
            $this->options[$group][] = [
                'value' => $value,
                'label' => $label,
            ];
        } else {
            $this->options[] = [
                'value' => $value,
                'label' => $label,
            ];
        }
    }


    public function __toString()
    {
        return $this->render();
    }
}
