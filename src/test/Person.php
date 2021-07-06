<?php


namespace ComposerIncludeFiles\test;


class Person {
    private $skills;
    public
    function __construct($skills) {
        $this->skills = $skills;
    }
    public
    function totalSkills() {
        return count($this->skills);
    }
}
