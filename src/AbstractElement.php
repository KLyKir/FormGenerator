<?php

namespace src;

abstract class AbstractElement
{
    public function __construct(
        public string $id = " ", public string $Name = ""
    ){
        $this->id = $id;
        $this->Name = $Name;
        if(str_contains($this->id,'"')){
            str_replace( $this->id, '"', '`');
        }
        if(str_contains($this->Name,'"')){
            str_replace( $this->Name, '"', '`');
        }
    }
}