<?php

require_once dirname(__FILE__) . '/PayCalculator.php';
require_once dirname(__FILE__) . '/HourReporter.php';
require_once dirname(__FILE__) . '/EmployeeRepository.php';

if (count($argv) === 1) {
    echo "エラー: 第一引数に経理/人事/DB管理者のいずれかを設定して実行ください。\n";
    exit(1);
}

switch ($argv[1]) {
    case "経理":
        $deptClass = new PayCalculator();
        break;
    case "人事":
        $deptClass = new HourReporter();
        break;
    case "DB管理者":
        $deptClass = new EmployeeRepository();
        break;
    default:
        echo "エラー: 第一引数に経理/人事/DB管理者のいずれかを設定して実行ください。\n";
        exit(1);
}

$employees = [
    new Employee("ハトホル", "0001", 20, 160, 1000),
    new Employee("ソプデト", "0002", 30, 300, 2000),
    new Employee("バステト", "0003", 20, 180, 5000),
    new Employee("メジェド", "0004", 19, 114, 3200)
];

foreach ($employees as $employee) {
    echo ($deptClass->exec($employee));
    echo "\n";
    echo "=========================\n";
}
