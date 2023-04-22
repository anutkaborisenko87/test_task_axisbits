<?php
require_once 'Office.php';
class Company
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var array
     */
    private $offices = [];

    public function __construct(string $name) {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param Office $office
     * @return void
     */
    public function addOffice(Office $office)
    {
        $this->offices[] = $office;
    }

    /**
     * @return array
     */
    public function getOffices(): array
    {
        return $this->offices;
    }

    /**
     * @return array
     */
    public function getOfficesSortedBySalary(): array
    {
        $sortedOffices = $this->offices;
        usort($sortedOffices, function($a, $b) {
            $aSalarySum = $a->getSalarySum();
            $bSalarySum = $b->getSalarySum();
            if ($aSalarySum == $bSalarySum) {
                return 0;
            }
            return ($aSalarySum > $bSalarySum) ? -1 : 1;
        });
        return $sortedOffices;
    }

    /**
     * @param int $minCount
     * @param int $maxCount
     * @return array
     */
    public function getOfficesWithEmployeesCountInRange(int $minCount, int $maxCount): array
    {
        $result = [];
        foreach ($this->offices as $office) {
            $employeeCount = $office->getEmployeeCount();
            if ($employeeCount >= $minCount && $employeeCount <= $maxCount) {
                $result[] = [
                    'name' => $office->getName(),
                    'count' => $employeeCount,
                ];
            }
        }
        return $result;
    }

    /**
     * @param int $countOffices
     * @param int $countEmployeesInOffice
     * @return void
     */
    public function createCompanyWithOfficesAndEmployees(int $countOffices, int $countEmployeesInOffice)
    {
        for ($i = 1; $i <= $countOffices; $i++) {
            $office = new Office("Office " . $i);

            for ($j = 1; $j <= $countEmployeesInOffice; $j++) {
                $employee = new Employee("Employee " . $j, rand(1000, 5000));
                $office->addEmployee($employee);
            }

            $this->addOffice($office);
        }
    }

    /**
     * @return string
     */
    public function getTableOfOfficesAndEmployees(): string
    {
        $html = '<table style="border-collapse: collapse; border: 1px solid black;">';
        $html .= '<thead><tr><th style="border: 1px solid black; padding: 5px;">Office Name</th><th style="border: 1px solid black; padding: 5px;">Employee Name</th><th style="border: 1px solid black; padding: 5px;">Salary</th></tr></thead>';
        $html .= '<tbody>';

        foreach ($this->offices as $office) {
            $employees = $office->getEmployees();
            $employeeCount = count($employees);

            if ($employeeCount === 0) {
                continue;
            }

            $html .= '<tr>';
            $html .= '<td  style="border: 1px solid black; padding: 5px;" rowspan="' . $employeeCount . '">' . $office->getName() . '</td>';
            $html .= '<td  style="border: 1px solid black; padding: 5px;">' . $employees[0]->getName() . '</td>';
            $html .= '<td  style="border: 1px solid black; padding: 5px;">' . $employees[0]->getSalary() . '</td>';
            $html .= '</tr>';

            for ($i = 1; $i < $employeeCount; $i++) {
                $html .= '<tr>';
                $html .= '<td  style="border: 1px solid black; padding: 5px;">' . $employees[$i]->getName() . '</td>';
                $html .= '<td  style="border: 1px solid black; padding: 5px;">' . $employees[$i]->getSalary() . '</td>';
                $html .= '</tr>';
            }
        }

        $html .= '</tbody></table>';
        return $html;
    }

    /**
     * @return string
     */
    public function getTableOfOfficesSortedBySalary(): string
    {
        $sortedOffices = $this->getOfficesSortedBySalary();

        $html = '<table border="1">';
        $html .= '<thead><tr><th>Office Name</th><th>Salary Sum</th></tr></thead>';
        $html .= '<tbody>';

        $currentOfficeName = null;
        $rowspan = 0;

        foreach ($sortedOffices as $office) {
            $officeName = $office->getName();
            $salarySum = $office->getSalarySum();

            if ($officeName !== $currentOfficeName) {
                if ($currentOfficeName !== null) {
                    $html .= '<tr><td rowspan="' . $rowspan . '">' . $currentOfficeName . '</td><td>' . $salarySum . '</td></tr>';
                }
                $currentOfficeName = $officeName;
                $rowspan = 1;
            } else {
                $rowspan++;
            }
        }
        if ($currentOfficeName !== null) {
            $html .= '<tr><td rowspan="' . $rowspan . '">' . $currentOfficeName . '</td><td>' . $salarySum . '</td></tr>';
        }
        $html .= '</tbody></table>';
        return $html;
    }

    /**
     * @param int $minCount
     * @param int $maxCount
     * @return string
     */
    public function getTableOfOfficesWithEmployeesCountInRange(int $minCount, int $maxCount): string
    {
        $offices = $this->getOfficesWithEmployeesCountInRange($minCount, $maxCount);
        if (count($offices) === 0) {
            return '<h6>The list of offices for given conditions is empty</h6>';
        }

        $html = '<table border="1">';
        $html .= '<thead><tr><th>Office Name</th><th>Employee Count</th></tr></thead>';
        $html .= '<tbody>';

        foreach ($offices as $office) {
            $html .= '<tr><td>' . $office['name'] . '</td><td>' . $office['count'] . '</td></tr>';
        }

        $html .= '</tbody></table>';
        return $html;
    }
}