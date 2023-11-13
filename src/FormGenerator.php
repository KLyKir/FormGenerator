<?php

namespace src;

class FormGenerator
{
    public function __construct($form = ""){
        $this->form = $form;

    }

    public function createForm($formArr): string
    {
        $this->form = "<form>";
        foreach($formArr as $val) {
            if($val['element'] == 'select') {
                $optArr = array();
                foreach ($val['optionArr'] as $option){
                    $opt = new option($option['value'], $option['optionName']);
                    array_push($optArr, $opt);
                }
                $element = new select($val['id'], $val['Name'], $optArr);
            }
            else{
                $className = 'src\\' . $val['element'];
                $element = new $className($val['id'], $val['Name']);
            }
            $this->form .= $element->render();
        }
        $this->form .= "</form>";
        return $this->form;
    }
}