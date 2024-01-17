<?php

include 'IRender.php';
class Form implements IRender
{
    protected array $inputs;
    protected string $method;
    protected string $action;

    public function __construct(string $method, string $action )
    {
        $this->inputs = [];
        $this->method = $method;
        $this->action = $action;
    }



    /**
     * @return array
     */
    public function getInputs(): array
    {
        return $this->inputs;
    }

    public function addInput(Input $input): void
    {
        $this->inputs[] = $input;
    }

    public function addOption(Option $option): void
    {
        $this->inputs[] = $option;
    }

    public function addSelect(Select $select): void
    {
        $this->inputs[] = $select;
    }


    public function render(): string
    {
        $html = "<form class='form-horizontal' role='form' method='$this->method' action='$this->action'>".PHP_EOL;
        foreach ($this->inputs as $input) {
            $html .= "<div class='col-sm-10'>".PHP_EOL;
            $html .= $input->render();
            $html .= "</div>".PHP_EOL;


        }

        $html .= "</form>";
        return $html;

    }

}