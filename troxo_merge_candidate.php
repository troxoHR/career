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

/**
* If apropriate conditions are met, these function will add a new member to the $troxoTeam array and will return true. 
* Othervise it will return false.
*
* @param array $troxoTeam, Candidate $you
* @return boolean
*/

function merge(array $troxoTeam, Candidate $you) {

	$backendSkills = array ('php','.net'); 
	// @TODO skills could be a separate parent class while specific skills could be classes that inherit it
	// checkSkill method could be implemented and inherited

	$frontendSkills = array ('html', 'css', 'javascript'); //array instancing backward compatible

	If ( in_array($backendSkills, $you->return_skills()) ) {
		$conditionOne = true;
	} elseif ( $you->add_skills( array_diff( $backendSkills, $you->return_skills() ) ) ) {
		$conditionOne = true;
	} else {
		$conditionOne = false;
	}

	If ( array_intersect( $frontendSkills, $you->return_skills() ) == $frontendSkills ) {
		$conditionTwo = true;
	} elseif ( $you->add_skills( array_diff( $frontendSkills, $you->return_skills() ) ) ) {
		$conditionTwo = true;
	} else {
		$conditionTwo = false;
	}

	If ($conditionOne && $conditionTwo) {
		$troxoTeam[] = $you;
		return true;
	} else {
		return false;
	}
}


class Candidate
{
	public $skills, $motivation, $skill_lvl, $name, $email; 

	public function __construct($skills, $motivation, $skill_lvl, $name, $email)
	{
		$this->skills = $skills;
		
		if($motivation > 9000){
			// its over 9000
			$this->motivation = 9001;
		} else {
			// too low
			$this->motivation = $motivation; 
		}

		$this->skill_lvl = $skill_lvl;
		$this->name      = $name;
		$this->email     = $email;
	}

	// ----------------------------------------------- <- this is how I separate each method or group so I can concentrate better; It's just easyer on my eyes
	public function set_skills($skills)
	{
		$this->skills = $skills;
	}

	// -----------------------------------------------
	public function return_skills()
	{
		return $this->skills;
	}

	public function return_motivation()
	{
		return $this->motivation;
	}
	// -----------------------------------------------
	public function add_skills($new_skills)
	{
		if($new_skills)
		{
			foreach ($new_skills as $key => $one_new_skill) 
			{
				if( $this->can_skill_be_added() )
				{
					$this->skills[] = $one_new_skill; 
				} else {
					// well... :)
				}
			}
			return true;
		} else {
			return false;
		}
	}

	public function can_skill_be_added()
	{
		return true;
	}
}


// -----------------------------------------------------------------------------------------------------------
// ----------------------------------------------- Driver code ----------------------------------------------- 
// -----------------------------------------------------------------------------------------------------------

// props setup
$skills = ['php', 'html', 'css', 'javascript', 'python', 'photoshop', 'mysql'];
$motivation = 374837432423456;
$troxoTeam = [];

// --- junk ---
// subjective/self critical skill level => tech - in key value pairs (0, 10)
$skill_lvl = ['php' => 7, 'html' => 4.1, 'css' => 2.1, 'javascript' => 2.5, 'python' => 1.9, 'photoshop' => 4, 'mysql' => 2.9];
$name = 'Dimitrije Drakulić'; 
$email = 'dimitrijedrakulic@gmail.com';

$you = new Candidate($skills, $motivation, $skill_lvl, $name, $email);
var_dump( merge( $troxoTeam, $you));


// -----------------------------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------------------------- 
// -----------------------------------------------------------------------------------------------------------

?>