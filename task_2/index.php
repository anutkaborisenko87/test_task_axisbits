<?php

require_once 'baseClasses/Company.php';
require_once 'baseClasses/Employee.php';
require_once 'baseClasses/Office.php';
require_once 'Tests/TestCompany.php';

echo '<div style="margin: 2px auto">';
$company = new Company("AxisBits");
$company->createCompanyWithOfficesAndEmployees(5, 3);
$tableHtml = $company->getTableOfOfficesAndEmployees();

echo '<h2>Company name is ' . $company->getName() . '</h2>';
echo '<h5>Companys` offices:</h5>';
echo $tableHtml;
echo '</div>';
echo '<div style="margin: 2px auto">';
echo '<h5>Sorted offices by salaries:</h5>';
echo $company->getTableOfOfficesSortedBySalary();
echo '</div>';
echo '<div style="margin: 2px auto">';
echo '<h5>Sorted list of offices where the number of employees is from 5 to 19:</h5>';
echo $company->getTableOfOfficesWithEmployeesCountInRange(5, 19);
echo '</div>';
echo '<div style="margin: 2px auto">';
echo '<h5>Sorted list of offices where the number of employees is from 3 to 23:</h5>';
echo $company->getTableOfOfficesWithEmployeesCountInRange(3, 23);
echo '</div>';


$testCompany = new TestCompany();

echo '<div style="margin: 5px auto">';
echo '<h2>Company creation tests</h2>';
foreach ($testCompany->testCompanyCreate() as $key=>$item) {
    echo 'Test ' . $key . '</br>';
    foreach ($item as $k=>$i) {
        echo $k . ' - ' . $i . '</br>';
    }
}
echo '</div>';

echo '<div style="margin: 5px auto">';
echo '<h2>Range employees tests</h2>';
foreach ($testCompany->testSortCountOfEmployees() as $key=>$item) {
    echo $key . ' - ' . $item . '</br>';
}
echo '</div>';

echo '<div style="margin: 5px auto">';
echo '<h2>Sort offices` salaries tests</h2>';
foreach ($testCompany->testGetOfficesSortedBySalary() as $key=>$item) {
    echo $key . ' - ' . $item . '</br>';
}
echo '</div>';