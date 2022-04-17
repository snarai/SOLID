<?php
require_once("./Employee.php");

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
    public function calculatePay(): int
    {
        // これを超えると残業扱いになる時間（働いた日数 × 通常の勤務時間）
        // MEMO: 厳密には月の規定の出社日数を使うと思いますが、複雑になるのでこれで・・・
        $regularHourMax = $this->workDayCount * $employee->regularHours();

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
}