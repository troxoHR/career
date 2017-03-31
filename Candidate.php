<?php
namespace Career;

use Career\Skills\Skill;

class Candidate
{
    private $firstName;

    private $lastName;

    private $skills;

    public function __construct($firstName, $lastName)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    /**
     * Get persons first name
     * 
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Get persons last name
     * 
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Get persons full name
     * 
     * @return string
     */
    public function getFullName()
    {
        return $this->firstName.' '.$this->lastName;
    }

    /**
     * Return array of skills
     * 
     * @return array
     */
    public function getSkills()
    {
        return $this->skills;
    }

    /**
     * Add new skill to skills array / Learn new skill 
     * @param Skill $skill
     * @return bool
     */
    public function addSkill(Skill $skill)
    {
        $this->skills[] = $skill;

        return true;
    }
}