<?php

/**
 * 社員クラス
 */
class Employee
{
    /**
     * 氏名
     */
    public string $name;

    /**
     * 社員番号
     */
    public string $id;

    /**
     * ある月の出勤日数
     */
    public int $workDayCount;

    /**
     * ある月の勤務時間
     */
    public int $workHour;

    /**
     * 時間単価
     */
    public int $hourlyPrice;

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
