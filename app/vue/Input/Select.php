<?php

require_once 'IRender.php';

class Select implements IRender
{
    protected string $id;
    protected string $placeholder;
    protected array $options;

    public function __construct(string $id, string $placeholder, array $options)
    {
        $this->id = $id;
        $this->placeholder = $placeholder;
        $this->options = $options;
    }

    public function render(): string
    {
        $html = "<select class='form-control' id='{$this->id}' name='{$this->id}'>".PHP_EOL;
        $html .= "<option value=''>{$this->placeholder}</option>".PHP_EOL;
        foreach ($this->options as $option) {
            $html .= $option->render();
        }
        $html .= "</select>".PHP_EOL;
        return $html;
    }
}