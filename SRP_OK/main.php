<?php

require_once("./Employee.php");

$employees = [
    new Employee("ハトホル", "0001", 20, 160, 1000),
    new Employee("ソプデト", "0002", 30, 300, 2000),
    new Employee("バステト", "0003", 20, 180, 5000),
    new Employee("クヌム", "0004", 19,  114, 3200)
];

if (count($argv) === 1) {
    echo "エラー: 第一引数に経理/人事/DB管理者のいずれかを設定して実行ください。\n";
    exit(1);
}

foreach ($employees as $employee) {
    switch ($argv[1]) {
        case "経理":
            echo ($employee->getName() . " さんの今月のお給料は " . number_format($employee->calculatePay()) . " 円です。\n");
            break;
        case "人事":
            echo $employee->reportHours();
            break;
        case "DB管理者":
            echo $employee->save();
            break;
        default:
            echo "エラー: 第一引数に経理/人事/DB管理者のいずれかを設定して実行ください。\n";
            exit(1);
    }

    echo "\n";
    echo "=========================\n";
}
