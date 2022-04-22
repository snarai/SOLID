<?php

require_once("./Employee.php");

class EmployeeRepository extends Employee
{
    /**
     * Database に登録します。
     *
     * @return string メッセージ
     */
    private function save(): string
    {
        return "データベースの情報を更新しました。" . "ID = [" . $this->id . "] name = [" . $this->name . "]\n";
    }
    /**
     * main.php で処理を実行します。
     *
     *
     */
    public function exec()
    {
        echo $this->save();
    }
}
