<?php
require_once __DIR__ . '/../baseClasses/Company.php';
class TestCompany
{

    /**
     * @return array|void
     */
    public function testCompanyCreate()
    {
        $testResults = [];
        foreach ($this->dataForTests() as $key => $test) {
            $name = $test['companyName'];
            $needleCountOffices = $test['countOffices'];
            $needleCountEmployees = $test['countEmployees'];
            $needleAllCompanyEmployees = $needleCountEmployees*$needleCountOffices;
            $company = new Company($name);
            $company->createCompanyWithOfficesAndEmployees($needleCountOffices, $needleCountEmployees);
            $testResults[$key+1]['test company name'] = (assert($name, $company->getName()) ? 'passed result is ' . $company->getName() : 'test failed expected result - ' . $name . ', but current result is ' . $company->getName());
            $testResults[$key+1]['test offices count'] = (assert($needleCountOffices, count($company->getOffices())) ? 'passed result is ' . count($company->getOffices()) : 'test failed expected result - '.$needleCountOffices.', but current result is ' . count($company->getOffices()));
            $employeeCount = 0;
            foreach ($company->getOffices() as $office) {
                $employeeCount += $office->getEmployeeCount();
            }
            $testResults[$key+1]['test employees count'] = (assert($needleAllCompanyEmployees, $employeeCount) ? 'passed result is ' . $employeeCount : 'test failed expected result - ' . $needleAllCompanyEmployees . ', but current result is ' . $employeeCount);
            unset($company);

        }

        return $testResults;
    }

    public function testSortCountOfEmployees()
    {
        $testData = $this->dataForTests()[2];
        $company = new Company($testData['companyName']);
        $company->createCompanyWithOfficesAndEmployees($testData['countOffices'], $testData['countEmployees']);
        $rangeEmployeesCount5to19 =  count($company->getOfficesWithEmployeesCountInRange(5, 19));
        $range5to19 = (assert(0, $rangeEmployeesCount5to19) ? 'passed for count of employees in office from 5 to 19 is ' .  $rangeEmployeesCount5to19 :  'for count of employees in office from 5 to 19 is failed expected result - 0, but current result is ' . $rangeEmployeesCount5to19 );
        $rangeEmployeesCount3to23 =  count($company->getOfficesWithEmployeesCountInRange(3, 23));
        $range3to23 = (assert($testData['countOffices'], $rangeEmployeesCount3to23) ? 'passed for count of employees in office from 3 to 23 is ' .  $rangeEmployeesCount3to23 :  'for count of employees in office from 5 to 19 is failed expected result - '. $testData['countOffices'] .', but current result is ' . $rangeEmployeesCount3to23 );
       
        return [
            'test range employees from 5 to 19' => $range5to19,
            'test range employees from 3 to 23' => $range3to23,
        ];
    }

    public function testGetOfficesSortedBySalary()
    {
        $testData = $this->dataForTests()[3];
        $company = new Company($testData['companyName']);
        $company->createCompanyWithOfficesAndEmployees($testData['countOffices'], $testData['countEmployees']);
        $sortedOffices = $company->getOfficesSortedBySalary();
        $resultCountOfOffices = (assert($testData['countOffices'], count($sortedOffices)) ? 'passed for count of offices '. $testData['countOffices'] .'  is ' .  count($sortedOffices) :  'for count of offices' . $testData['countOffices'] . ' is failed expected result - '. $testData['countOffices'] .', but current result is ' . count($sortedOffices));
        $sortResult = array_reduce($sortedOffices, function ($carry, $item) {
            if (!is_null($carry) && $carry !== false && $item->getSalarySum() <= $carry) {
                return false;
            }
            return $item->getSalarySum();
        });

        $testSortedSalary = ($sortResult > 0 ? 'passed employee salaries are sorted correctly':  'failed: employee salaries sorted incorrectly');
        return [
            'test count of sorted offices' => $resultCountOfOffices,
            'test sorted salary' => $testSortedSalary
        ];
    }

    private function dataForTests(): array
    {
        return [
            ['companyName' => 'TestCompany1', 'countOffices'=>5, 'countEmployees' => 3],
            ['companyName' => 'TestCompany2', 'countOffices'=>6, 'countEmployees' => 6],
            ['companyName' => 'TestCompany3', 'countOffices'=>7, 'countEmployees' => 20],
            ['companyName' => 'TestCompany4', 'countOffices'=>3, 'countEmployees' => 3],
        ];
    }
}