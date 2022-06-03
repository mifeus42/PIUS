<?php
include 'Employee.php';

class Departament
{
    public $employees = [];
    public string $title;

    public function getSumSalary()
    {
        $sumSalary = 0;
        foreach($this->employees as $employee)
        {
            $sumSalary += $employee->salary;
        }
        return $sumSalary;
    }

    public static function sumSalaryCompare(Departament $departament1, Departament $departament2)
    {
        if($departament1->getSumSalary() > $departament2->getSumSalary())
        {
            return 1;
        }
        else if ($departament1->getSumSalary() == $departament2->getSumSalary())
        {
            return 0;
        }
        else
        {
            return -1;
        }
    }

    public static function employeeCountCompare(Departament $departament1, Departament $departament2)
    {
        if(sizeof($departament1->employees) > sizeof($departament2->employees))
        {
            return 1;
        }
        else if (sizeof($departament1->employees) == sizeof($departament2->employees))
        {
            return 0;
        }
        else
        {
            return -1;
        }
    }

    public function __construct($employees, string $title)
    {
        $this->employees = $employees;
        $this->title = $title;
    }
    
}
?>