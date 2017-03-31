<?php
namespace Career\Skills;

use Career\Skills\Skill;
use Career\Skills\FullStack;

class Javascript extends Skill implements FullStack
{
    public function writeJavascript()
    {
        return 'Javascript Code';
    }

    public function writeFullStack()
    {
        return $this->writeJavascript();
    }
}