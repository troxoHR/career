<?php
namespace Career\Skills;

use Career\Skills\Skill;
use Career\Skills\BackEnd;

class Net extends Skill implements BackEnd
{
    public function writeNet()
    {
        return '.Net Code';
    }

    public function writeBackEnd()
    {
        return $this->writeNet();
    }
}