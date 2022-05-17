<?php

require_once("./EmployeeData.php");

/**
 * 人事クラス
 */
class HourReporter
{
    /**
     * 期間内の労働時間をレポートします。
     *
     * @return integer 月間労働時間
     */
    private function reportHours(Employee $employee): string
    {
        // 総合で所定労働時間を超えた時間が残業時間
        $overWorkHour = $employee->getWorkHour($employee) - ($this->regularHours() * $employee->getWorkDayCount($employee));

        $text = "社員番号: " . $employee->getId($employee) . "\n";
        $text .= "お名前: " . $employee->getName($employee) . " さん\n";
        $text .= "\n";
        $text  .= "総業務時間: " . $employee->getWorkHour($employee) . " 時間 \n";
        $text .= "残業時間: " . ($overWorkHour > 0 ? $overWorkHour : 0) . "時間 \n";
        if ($overWorkHour > 10) {
            $text .= "\n！！残業時間が 10 時間を超えています！！\n";
        }
        return $text;
    }
    /**
     * 所定労働時間算出
     *
     * @return integer 所定労働時間
     */
    private function regularHours(): float
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
        echo $this->reportHours($employee);
    }
}
