<?php 
/**
* @author Troxo Junior
* @copyright Troxo d.o.o.
* 
* This file contains function for adding a new member to the Troxo team. 
* Idea is for this function to evolve into a more complex module through iterative development process.
* 
* This file is still under development
*
*/
namespace Career;

use Career\Candidate;
use Career\Skills\BackEnd;
use Career\Skills\HTML;
use Career\Skills\CSS;
use Career\Skills\Javascript;

class Troxo
{
    private static $troxo;

    private $team;

    private function __construct() {}

    private function __clone() {}

    /**
     * Get Troxo instance if already exists or create a new instance
     * 
     * @return Troxo
     */
    public static function getInstance()
    {
        if (!self::$troxo) {
            self::$troxo = new static;
        }

        return self::$troxo;
    }

    /**
     * Add member to team if conditions are met
     * @param Candidate $candidate
     * @return bool
     */
    public function addTeamMember(Candidate $candidate) 
    {
        if ($this->checkSkills($candidate)) {
            $this->team[] = $candidate;
            return true;
        }

        return false;
    }

    /**
     * Check if candidate has required back end skills
     * @param Candidate $candidate
     * @return bool
     */
    protected function checkBackEnd(Candidate $candidate)
    {
        foreach ($candidate->getSkills() as $skill) {
            if ($skill instanceof BackEnd) {
                return true;
            }
        }

        return false;
    }

    /**
     * Check if candidate has required front end skills
     * @param Candidate $candidate
     * @return bool
     */
    protected function checkFrontEnd(Candidate $candidate)
    {
        $html = false;
        $css  = false;
        foreach ($candidate->getSkills() as $skill) {
            if ($skill instanceof HTML) {
                $html = true;
            } elseif ($skill instanceof CSS) {
                $css = true;
            }
        }

        return $html && $css;
    }

    /**
     * Check if candidate has required full stack skills
     * @param Candidate $candidate
     * @return bool
     */
    protected function checkFullStack(Candidate $candidate)
    {
        foreach ($candidate->getSkills() as $skill) {
            if ($skill instanceof Javascript) {
                return true;
            }
        }

        return false;
    }

    /**
     * Check if candidate has all of the required skills
     * @param Candidate $candidate
     * @return bool
     */
    protected function checkSkills(Candidate $candidate)
    {
        return  $this->checkBackEnd($candidate) &&
                $this->checkFrontEnd($candidate) && 
                $this->checkFullStack($candidate);
    }
}