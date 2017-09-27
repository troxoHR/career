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
merge(array $troxoTeam, Candidate $you) {

	$backendSkills = array (‘php’,’.net’); 
	// @TODO skills could be a separate parent class while specific skills could be classes that inherit it
	// checkSkill method could be implemented and inherited

	$frontendSkills = array (‘html’, ‘css’); //array instancing backward compatible***?

	$fullStackSkills = array (‘javascript’);

	$personalSkills = array (‘english language’,’hungry for knowledge’);

If (in_array(‘php’, $you.skills) or in_array(‘.net’ $you.skills)) {
	$conditionOne = true;
} 

If (array_intersect($frontendSkills, $you.skills) == $frontendSkills)) {
	$conditionTwo = true;
}

//code duplication! These could be a separate function
If (array_intersect($fullStackSkills, $you.skills) == $frontendSkills)) {
	$conditionThree = true;
}

/* IT seems there is a more efficient way to go through these conditions ----I can not see a solution right now! */

If ($conditionOne && $coditionTwo && $conditionThree) {

	$troxoTeam[] = $you;

	return true;

} else {

	return false;
}




/*I've done so much for now!*/




$you = array(
			'name'=>'Janko Kostic',
			'backendSkills'=>array('php'),
			'frontendSkills'=>array('html','css'),
			'fullStackSkills'=>array('javascript'),
			'personalSkills'=>array('english language','german language')
		);


/*you is patametar for class todo*/
class Todo
{
	protected $you;	
	
	function __construct($you){
		$this->you=$you;
	}

	protected function skills($skill){
		if (array_intersect($skill, $this->you) == $skill) {
			return true;
		}else{
			return false;
		}
	}
}

/*class for BackendSkills*/
class BackendSkills extends Todo 
{

	private $backendSkills = array('php','.net'); 	
	public function backendSkillsmethod(){
		if (in_array('php', $this->you) or in_array('.net', $this->you)) {
			return true;
		}else{
			return false;
		}
	}

}

/*class for frontendSkills*/
class FrontendSkill extends Todo
{
	private $frontendSkills = array ('html', 'css');
	public function frontendSkillsmethod(){
		$this->skills($this->frontendSkills);
	}

}

/*class for frontendSkills*/
class FullStackSkill extends Todo
{
	private $fullStackSkills = array ('javascript');
	public function fullStackSkillsmethod(){
		$this->skills($this->fullStackSkills);
	}
}


/*class for personalSkills*/
class PersonalSkill extends Todo 
{
	private $personalSkills = array('english language','hungry for knowledge'); 	
	public function personalSkillmethod(){
		if (in_array('english language', $this->you) or in_array('hungry for knowledge', $this->you)) {
			return true;
		}else{
			return false;
		}
	}

}

$conditionOne= new BackendSkills($you['backendSkills']);
$conditionOne = $conditionOne ->backendSkillsmethod();
$conditionTwo= new FrontendSkill($you['frontendSkills']);
$conditionTwo->frontendSkillsmethod();
$conditionThree= new FullStackSkill($you['fullStackSkills']);
$conditionThree->fullStackSkillsmethod();
$conditionFour= new PersonalSkill($you['personalSkills']);
$conditionFour ->personalSkillmethod();


/*if all conditions are met*/
if ($conditionOne && $conditionTwo && $conditionThree&&$conditionFour) {
	$troxoTeam[] = $you['name'];
	return true;
} else {
	return false;
}


?>