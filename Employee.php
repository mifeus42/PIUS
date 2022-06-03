<?php

include 'vendor/autoload.php';
include 'comment.php';

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Mapping\ClassMetadata;

class Employee 
{
    public int $id;
    public string $name;
    public int $salary;
    public DateTime $dateEmployment;

    public function getWorkExperience()
    {
        return date_diff(new DateTime(), $this->dateEmployment)->y;
    }

    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('id', new Assert\NotBlank());
        $metadata->addPropertyConstraint('id', new Assert\Positive());
        $metadata->addPropertyConstraint('name', new Assert\NotBlank());
        $metadata->addPropertyConstraint('name', new Assert\NotNull());
        $metadata->addPropertyConstraint('name', new Assert\Length(array(
            'min'        => 1,
            'max'        => 30,
        )));
        $metadata->addPropertyConstraint('salary', new Assert\NotBlank());
        $metadata->addPropertyConstraint('salary', new Assert\Positive());
        $metadata->addPropertyConstraint('dateEmployment', new Assert\NotBlank());
        $metadata->addPropertyConstraint('dateEmployment', new Assert\NotNull());
        
    }

    public function __construct(int $id, string $name, int $salary, DateTime $dateEmployment)
    {
        $this->id = $id;
        $this->name = $name;
        $this->salary = $salary;
        $this->dateEmployment = $dateEmployment;
    }

    public function __toString()
    {
        return 'Id: ' . $this->id . " Name: " . $this->name . 
        " Salary: " . $this->salary . " dateEmployment: " ;
    }
}
?>