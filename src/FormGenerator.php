<?php

namespace src;

class FormGenerator
{
    public function __construct($formArr = []){
        $this->form = "<form>";
        foreach($formArr as $val) {
            if($val['element'] == 'text'){
                $element = new text($val['id'], $val['Name']);
            }
            if($val['element'] == 'checkbox'){
                $element = new checkbox($val['id'], $val['Name']);
            }
            if($val['element'] == 'button'){
                $element = new button($val['id'], $val['Name']);
            }
            if($val['element'] == 'input'){
                $element = new input($val['id'], $val['Name']);
            }
            if($val['element'] == 'radiobutton'){
                $element = new radiobutton($val['id'], $val['Name']);
            }
            if($val['element'] == 'submit'){
                $element = new submit($val['id'], $val['Name']);
            }
            if($val['element'] == 'select') {
                $optArr = array();
                foreach ($val['optionArr'] as $option){
                    $opt = new option($option['value'], $option['optionName']);
                    array_push($optArr, $opt);
                }
                $element = new select($val['id'], $val['Name'], $optArr);
            }
            $this->form .= $element->render();
        }
        $this->form .= "</form>";

    }

    public function getForm(): string
    {
        return $this->form;
    }
}