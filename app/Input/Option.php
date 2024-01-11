<?php 

require_once 'IRender.php';

class Option implements IRender

    {
        protected string $value;

        public function __construct(string $value)
        {
            $this->value = $value;
        }

        public function render(): string
        {
            $html = "<option value='{$this->value}'>{$this->value}</option>".PHP_EOL;
            return $html;
        }

    }