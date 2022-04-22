<?php

/**
 * 社員クラス
 */
class Employee
{
    /**
     * 氏名
     */
    private string $name;

    /**
     * 社員番号
     */
    private string $id;

    /**
     * ある月の出勤日数
     */
    private int $workDayCount;

    /**
     * ある月の勤務時間
     */
    private int $workHour;

    /**
     * 時間単価
     */
    private int $hourlyPrice;

    /**
     * コンストラクタ
     *
     * @param string $name 名前
     * @param string $id ID
     * @param integer $workDayCount 働いた日数
     * @param integer $workHour 労働時間
     * @param integer $hourlyPrice 時間給
     */
    public function __construct(
        string $name,
        string $id,
        int $workDayCount,
        int $workHour,
        int $hourlyPrice
    ) {
        $this->name = $name;
        $this->id = $id;
        $this->workDayCount = $workDayCount;
        $this->workHour = $workHour;
        $this->hourlyPrice = $hourlyPrice;
    }

    /**
     * 給与を計算します。
     *
     * @return integer 給与額
     */
    public function calculatePay(): int
    {
        // これを超えると残業扱いになる時間（働いた日数 × 通常の勤務時間）
        // MEMO: 厳密には月の規定の出社日数を使うと思いますが、複雑になるのでこれで・・・
        $regularHourMax = $this->workDayCount * $this->regularHours();

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
     * 期間内の労働時間をレポートします。
     *
     * @return integer 月間労働時間
     */
    public function reportHours(): string
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
     * Database に登録します。
     *
     * @return string メッセージ
     */
    public function save(): string
    {
        return "データベースの情報を更新しました。" . "ID = [" . $this->id . "] name = [" . $this->name . "]\n";
    }

    /**
     * 社員名を返却します。
     *
     * @return string 社員名
     */
    public function getName(): string
    {
        return $this->name;
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
}
