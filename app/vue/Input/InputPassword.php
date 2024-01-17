<?php

class InputPassword extends Input
{

    public function __construct(string $name, string $id, string $placeholder, string $value,$nomlabel)
    {
        parent::__construct($name, $id, $placeholder, $value);
        $this->nomlabel = $nomlabel;
    }
    public function render(): string
    {
        return "<label for='$this->id'>$this->nomlabel</label><input type='password' name='$this->name' id='$this->id' placeholder='$this->placeholder' value='$this->value' required><br>";
    }
}