<?php

declare(strict_types=1); 

// require_once dirname(__FILE__) . '/Employee.php';
require_once("./Employee.php");


class EmployeeRepository extends Employee
{
    /**
     * Database に登録します。
     *
     * @return string メッセージ
     */
    public function save(): string
    {
//        echo "データベースの情報を更新しました。";
        return "データベースの情報を更新しました。" . "ID = [" . $this->id . "] name = [" . $this->name . "]\n";
    }
}
