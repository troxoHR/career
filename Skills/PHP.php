<?php
namespace Career\Skills;

use Career\Skills\Skill;
use Career\Skills\BackEnd;

class PHP extends Skill implements BackEnd
{
    public function writePHP()
    {
        return 'PHP Code';
    }

    public function writeBackEnd()
    {
        return $this->writePHP();
    }
}