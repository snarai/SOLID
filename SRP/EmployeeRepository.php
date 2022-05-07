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
        return "データベースの情報を更新しました。" . "ID = [" . $employee->id . "] name = [" . $employee->name . "]\n";
    }
    /**
     * 所定労働時間算出
     *
     * @return integer 所定労働時間
     */
    protected function regularHoursEmployeeRepository(): float
    {
        // 1 日の所定労働時間は 8 時間
        // MEMO: 実際はここでシフトごとの所定労働時間を計算して出していると仮定
        return 8.0;
    }
    /**
     * main.php で処理を実行します。
     *
     *
     */
    public function exec(Employee $employee)
    {
        echo $this->save($employee);
    }
}
