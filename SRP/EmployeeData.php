<?php

/**
 * 社員クラス
 */
class EmployeeData
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
     * 社員名を返却します。
     *
     * @return string 社員名
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * 社員番号を返却します。
     *
     * @return string 社員番号
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * 働いた日数を返却します。
     *
     * @return string 働いた日数
     */
    public function getWorkDayCount(): string
    {
        return $this->workDayCount;
    }

    /**
     * 労働時間を返却します。
     *
     * @return string 労働時間
     */
    public function getWorkHour(): string
    {
        return $this->workHour;
    }

    /**
     * 時間給を返却します。
     *
     * @return string 時間給
     */
    public function getHourlyPrice(): string
    {
        return $this->hourlyPrice;
    }

}
