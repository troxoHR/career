<?php
namespace Career\Skills;

use Career\Skills\Skill;
use Career\Skills\FrontEnd;

class CSS extends Skill implements FrontEnd
{
    public function writeCSS()
    {
        return 'CSS Code';
    }

    public function writeFrontEnd()
    {
        return $this->writeCSS();
    }
}