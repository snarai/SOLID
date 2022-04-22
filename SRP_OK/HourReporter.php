<?php

require_once("./Employee.php");

/**
 * 人事クラス
 */
class HourReporter extends Employee
{
    /**
     * 期間内の労働時間をレポートします。
     *
     * @return integer 月間労働時間
     */
    private function reportHours(): string
    {
        // 総合で所定労働時間を超えた時間が残業時間
        $overWorkHour = $this->workHour - ($this->regularHours() * $this->workDayCount);

        $text = "社員番号: " . $this->id . "\n";
        $text .= "お名前: " . $this->name . " さん\n";
        $text .= "\n";
        $text  .= "総業務時間: " . $this->workHour . " 時間 \n";
        $text .= "残業時間: " . ($overWorkHour > 0 ? $overWorkHour : 0) . "時間 \n";
        if ($overWorkHour > 10) {
            $text .= "\n！！残業時間が 10 時間を超えています！！\n";
        }
        return $text;
    }
    /**
     * main.php で処理を実行します。
     *
     *
     */
    public function exec()
    {
        echo $this->reportHours();
    }
}