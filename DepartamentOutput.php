<?php
include 'Departament.php';

$employees1 = [ new Employee(1, 'Misha', 10, new DateTime('2022-01-01')), 
                new Employee(2, 'Misha', 20, new DateTime('2022-01-01')), 
                new Employee(3, 'Misha', 30, new DateTime('2022-01-01'))];

$employees2 = [ new Employee(1, 'Misha', 10, new DateTime('2022-01-01')), 
                new Employee(2, 'Misha', 20, new DateTime('2022-01-01')), 
                new Employee(3, 'Misha', 30, new DateTime('2022-01-01'))];

$employees3 = [ new Employee(1, 'Misha', 30, new DateTime('2022-01-01')), 
                new Employee(2, 'Misha', 30, new DateTime('2022-01-01')), 
                new Employee(3, 'Misha', 30, new DateTime('2022-01-01'))];

$departaments = [new Departament($employees1, "Depart1"), new Departament($employees2, "Depart2"), new Departament($employees3, "Depart3")];

$maxSalaryDepartaments = [$departaments[0]];
$minSalaryDepartaments = [$departaments[0]];
for($i = 1; $i < sizeof($departaments); $i++)
{
    switch(Departament::sumSalaryCompare($departaments[$i], $maxSalaryDepartaments[0]))
    {
        case 1:
           unset($maxSalaryDepartaments);
           $maxSalaryDepartaments[] = $departaments[$i];
           break;
        case 0:
            switch(Departament::employeeCountCompare($departaments[$i], $maxSalaryDepartaments[0]))
            {
                case 1:
                    unset($maxSalaryDepartaments);
                    $maxSalaryDepartaments[] = $departaments[$i];
                    break;
                case 0:
                    $maxSalaryDepartaments[] = $departaments[$i];
                    break;
            }
            break;
    }
    switch(Departament::sumSalaryCompare($departaments[$i], $minSalaryDepartaments[0]))
    {
        case -1:
            unset($minSalaryDepartaments);
            $minSalaryDepartaments[] = $departaments[$i];
            break;
        case 0:
            switch(Departament::employeeCountCompare($departaments[$i], $minSalaryDepartaments[0]))
            {
                case 1:
                    unset($minSalaryDepartaments);
                    $minSalaryDepartaments[] = $departaments[$i];
                    break;
                case 0:
                    $minSalaryDepartaments[] = $departaments[$i];
                    break;
            }
            break;
    }
}
echo "Max: ". '<br>';
foreach($maxSalaryDepartaments as $maxSalaryDepartament)
{
    echo $maxSalaryDepartament->title . '<br>';
}
echo "Min: ". '<br>';
foreach($minSalaryDepartaments as $minSalaryDepartament)
{
    echo $minSalaryDepartament->title . '<br>';
}
?>