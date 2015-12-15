<?php

namespace Webup\LaravelForm\Elements;

class Select extends Base  {

	protected $type;
	protected $options = [];

	public function __construct($type)
	{
		parent::__construct();
		$this->type = $type;
	}

	public function render()
	{
		return view(
		'form::select', [
			'placeholder' => $this->placeholder,
			'value' => $this->value,
			'label' => $this->label,
			'required' => $this->required,
			'name' => $this->name,
			'errors' => $this->errors,
			'type' => $this->type,
			'attr' => $this->attr,
			'options' => $this->options
		])->render();
	}

	public function addOption($value = null, $label = null)
	{
		$this->options[] = [
			'value' => $value,
			'label' => $label
		];
		return $this;
	}

	public function __toString()
	{
		return $this->render();
	}

}
