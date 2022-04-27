<?php

/**
 * 社員クラス
 */
class Employee
{
    /**
     * 氏名
     */
    protected string $name;

    /**
     * 社員番号
     */
    protected string $id;

    /**
     * ある月の出勤日数
     */
    protected int $workDayCount;

    /**
     * ある月の勤務時間
     */
    protected int $workHour;

    /**
     * 時間単価
     */
    protected int $hourlyPrice;

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
    protected function getName(): string
    {
        return $this->name;
    }
}
