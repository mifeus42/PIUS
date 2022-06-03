<?php
include 'Employee.php';

use Symfony\Component\Validator\Validation;

$employees = [ new Employee(1, 'Misha', 100000, new DateTime('2022-01-01')), 
                new Employee(2, 'Misha', -1, new DateTime('2022-01-01')), 
                new Employee(0, 'Misha', 1, new DateTime('2022-01-01'))];

$validator = Validation::createValidatorBuilder()
    ->addMethodMapping('loadValidatorMetadata')
    ->getValidator();
$violations = [];
for($i = 0; $i < sizeof($employees); $i++)
{
    $violations[] = $validator->validate($employees[$i]);
}

for($i = 0; $i < sizeof($employees); $i++)
{
    if (count($violations[$i]) > 0) 
    {
        echo $employees[$i] . "Invalid employee" . '<br>';
    }
    else 
    {
        echo $employees[$i]. "Valid employee" . '<br>';
    }
}
?>