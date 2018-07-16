<?php

namespace Webup\LaravelForm\Elements;

use Crypt;

class TimeTrap
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
        return view('form::timetrap', [
              'name' => $this->name,
              'value' => $this->getTimeEncrypted(),
              'errors' => $this->errors,
            ])->render();
    }

    public function errors($errors = [])
    {
        $this->errors = $errors;

        return $this;
    }

    public function getTimeEncrypted()
    {
        return Crypt::encrypt(time());
    }

    public function decryptTime($time)
    {
        return Crypt::decrypt($time);
    }

    public function checkTimeTrap($attribute, $value, $parameters)
    {
        $submitedTime = $this->decryptTime($value);

        $timeToSubmit = (is_array($parameters) && count($parameters) > 0) ? $parameters[0] : config("form.antiSpam.minFormSubmitTime", 3);

        return ($submitedTime && ($submitedTime + $timeToSubmit) < time());
    }


    public function __toString()
    {
        return $this->render();
    }
}
