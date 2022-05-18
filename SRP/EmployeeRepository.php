<?php

require_once("./EmployeeData.php");

class EmployeeRepository
{
    /**
     * Database に登録します。
     *
     * @return string メッセージ
     */
    private function save(Employee $employee): string
    {
        return "データベースの情報を更新しました。" . "ID = [" . $employee->getId() . "] name = [" . $employee->getName() . "]\n";
    }
    /**
     * main.php で処理を実行します。
     *
     *
     */
    public function execSave(Employee $employee)
    {
        echo $this->save($employee);
    }
}
