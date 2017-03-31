<?php
namespace Career\Skills;

use Career\Skills\Skill;
use Career\Skills\FrontEnd;

class HTML extends Skill implements FrontEnd
{
    public function writeHTML()
    {
        return 'HTML Code';
    }

    public function writeFrontEnd()
    {
        return $this->writeHTML();
    }
}