<?php
require_once 'Employee.php';
class Office
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var array
     */
    private $employees = [];

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @param Employee $employee
     * @return void
     */
    public function addEmployee(Employee $employee)
    {
        $this->employees[] = $employee;
    }

    /**
     * @return array
     */
    public function getEmployees(): array
    {
        return $this->employees;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getEmployeeCount(): int {
        return count($this->employees);
    }

    /**
     * @return float
     */
    public function getSalarySum(): float {
        $sum = 0;
        foreach ($this->employees as $employee) {
            $sum += $employee->getSalary();
        }
        return $sum;
    }

}