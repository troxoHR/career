<?php

class Candidate
{
    public $name;
    public $skills = array ();

    public function __construct($name, array $skills)
    {
        $this->name = $name;
        $this->skills = $skills;
    }
}

abstract class Skills
{
    protected $skills = array ();

    abstract function checkSkill(Candidate $you);
}

class BackendSkills extends Skills
{
    protected $skills = array ('php', '.net');

    public function checkSkill(Candidate $you)
    {
        return !empty(array_intersect($this->skills, $you->skills));
    }
}

class FrontendSkills extends Skills
{
    protected $skills = array ('html', 'css');

    public function checkSkill(Candidate $you)
    {
        return array_intersect($this->skills, $you->skills) == $this->skills;
    }
}

class FullStackSkills extends Skills
{
    protected $skills = array ('javascript');

    public function checkSkill(Candidate $you)
    {
        return array_intersect($this->skills, $you->skills) == $this->skills;
    }
}

class PersonalSkills extends Skills
{
    protected $skills = array ('english language', 'hungry for knowledge');

    public function checkSkill(Candidate $you)
    {
        return array_intersect($this->skills, $you->skills) == $this->skills;
    }
}
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
/**
 * If apropriate conditions are met, these function will add a new member to the $troxoTeam array and will return true.
 * Othervise it will return false.
 *
 * @param array $troxoTeam, Candidate $you
 * @return boolean
 */
function merge(& $troxoTeam, Candidate $you)
{
    $backendSkills = new BackendSkills();
    $frontendSkills = new FrontendSkills();
	$fullStackSkills = new FullStackSkills();
	$personalSkills = new PersonalSkills();

	if (!($conditionOne = $backendSkills->checkSkill($you))) 
	{
        return false;
    }

	if (!($conditionTwo = $frontendSkills->checkSkill($you))) 
	{
        return false;
    }

    if (!($conditionThree = $fullStackSkills->checkSkill($you)))
    {
        return false;
	}
	
	if (!($conditionFour = $personalSkills->checkSkill($you)))
    {
        return false;
    }

    $troxoTeam[] = $you;

    return true;
}

// Example of usage
//$troxoTeam = array();
//$me = new Candidate('Nemanja', array ('php', 'html', 'css', 'javascript', 'english language', 'hungry for knowledge'));
//
//merge($troxoTeam, $me);