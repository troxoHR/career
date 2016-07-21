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

	$frontendSkills = array (‘html’, ‘css’); //array instancing backward compatible

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

/* IT seems there is a more efficient way to go through these conditions */

If ($conditionOne && $coditionTwo && $conditionThree) {

	$troxoTeam[] = $you;

	return true;

} else {

	return false;
}

?>