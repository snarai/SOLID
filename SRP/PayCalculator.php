<?php

require_once("./EmployeeData.php");

/**
 * 経理クラス
 */
class PayCalculator extends Employee
{
    /**
     * 給与を計算します。
     *
     * @return integer 給与額
     */
    private function calculatePay(): int
    {
        // これを超えると残業扱いになる時間（働いた日数 × 通常の勤務時間）
        // MEMO: 厳密には月の規定の出社日数を使うと思いますが、複雑になるのでこれで・・・
        $regularHourMax = $this->workDayCount * $this->regularHoursPayCalculator();

        // 残業がない場合
        if ($this->workHour <= $regularHourMax) {
            return $this->workHour * $this->hourlyPrice;
        }

        // 通常分
        $regularAmount = $regularHourMax * $this->hourlyPrice;

        // 残業分は 1.5 倍
        $overAmount = ($this->workHour - $regularHourMax) * $this->hourlyPrice * 1.5;

        return $regularAmount + $overAmount;
    }
    /**
     * 所定労働時間算出
     *
     * @return integer 所定労働時間
     */
    protected function regularHoursPayCalculator(): float
    {
        // 1 日の所定労働時間は 8 時間
        // MEMO: 実際はここでシフトごとの所定労働時間を計算して出していると仮定
        return 7.5;
    }
    /**
     * main.php で処理を実行します。
     *
     *
     */
    public function exec()
    {
        echo($this->getName() . " さんの今月のお給料は " . number_format($this->calculatePay()) . " 円です。\n");
    }
}