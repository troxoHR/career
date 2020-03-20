<?php 

/*
* @author Troxo Junior
* @copyright Troxo d.o.o.
*
* This file contains a function for adding a new member to the Troxo team. 
* The idea is for this function to evolve into a more complex module through iterative development process.
*
* This file is still under development
*/

// Some basic html format and a form
echo "<!DOCTYPE html>
<html lang='en'>
<head>
<title>Troxo</title>
</head>
<body>
<form method='POST'>
Your name: <input type='text' name='name' required><br>
Select your skills from the following categories:<br>
";

// A skill class that stores each skill's type and name
// @TODO Specific skills could be classes that inherit the baseclass
class skill{
	public $type;
	public $name;

	function __construct($type, $name) {
		$this->type = $type;
		$this->name = $name;
	}
	
	/*
	function checkSkill($Candidate){
		foreach ($Candidate->skills as $skill)
			if ($name == $skill["name"])
				return true;
		return false;
	}
	*/
}

// @TODO Investigate the possiblity of memory leaks if this is done without a variable name
$skills = array(
	$php = new skill("backend", "php"),
	$net = new skill("backend", ".net"),
	$htm = new skill("frontend", "html"),
	$css = new skill("frontend", "css"),
	$jvs = new skill("fullstack", "javascript"),
	$eng = new skill("personal", "english language"),
	$hun = new skill("personal", "hungry for knowledge")
);

// Generate checkboxes for each skill, split by the type, which will be sent as arrays
$i = 0;
$type = "";
foreach ($skills as $skill) {
	if ($type != $skill->type){
		$type = $skill->type;
		echo "<br>\n";
		echo "{$type}:<br>\n";
		echo "<br>\n";
	}
	echo "<input type='checkbox' name='{$type}[]' id='{$i}' value='{$type} {$skill->name}'>\n";
	echo "<label for='{$i}'>{$skill->name}</label><br>\n";
	$i++;
}

// End the form
echo "<br>
<button type='submit'>submit</button>
</form>
";

// A Candidate class that stores every candidate's name and their respective skills
class Candidate{
	public $name;
	public $skills;

	function __construct($name, $skills){
		$this->name = $name;
		$this->skills = $skills;
	}
}

/*
* This function checks weather the Candidate's skills fit the minimum requirements and returns true if so
* The requirements are defined as having three types with the minimum number of technologies for that type
* The function assumes a $min with matching types as in $skills
*
* @param array $skills, array $min
* @return boolean
*/
function checker(array $skills, array $min){
	$conditions = 0;
	$counter = array("backend" => 0, "frontend" => 0, "fullstack" => 0, "personal" => 0);
	
	// Counts the number of technologies in each type
	foreach ($skills as $skill){
		$counter[$skill["type"]]++;
		if ($counter[$skill["type"]] == $min[$skill["type"]])
			$conditions++;
	}
			
	
	if ($conditions >= 3)
		return true;
	return false;
}

/*
* If apropriate conditions are met, this function will add a new member to the $troxoTeam array and will return true. 
* Othervise it will return false.
*
* @param array $troxoTeam, Candidate $you
* @return boolean
*/
function merge(array $params) { // @TODO if PHP supports the ES6 way or implements named arguments themselves
	$troxoTeam = $params["troxoTeam"]?:array();
	$you = $params["candidate"];
	
	 // @TODO this could be more intuitive with "none", "any", "all", "exclude"
	if (checker($you->skills, array("backend" => 1, "frontend" => 2, "fullstack" => 1, "personal" => 3))){
		$troxoTeam[] = $you;
		return true;
	}

	return false;
}

// If this is a post request get the skill types and names from the returned arrays of grouped checkboxes
if (count($_POST)){
	$skills = array();

	foreach ($_POST as $sent){
		// I found this to be the easiest method to ignore the other fields and get the skills
		if (is_array($sent)){
			foreach($sent as $el){
				list($type, $name) = explode(" ", $el, 2);
				$skills[] = array("type" => $type, "name" => $name);
			}
		}
	}

	$you = new Candidate($_POST["name"], $skills);
	if (merge(["candidate" => $you]))
		echo "Welcome to Troxo, {$you->name}!";
}

// Ends the html document
echo"</body>
</html>";

?>
