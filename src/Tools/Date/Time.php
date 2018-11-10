<?php
/**
 * Created by PhpStorm.
 * User: zhaoxin
 * Date: 2017/9/13
 * Time: 10:48
 * 时间处理类
 */

namespace Tools\Date;


class Time
{
    /**
     * @创建人：赵心
     * @功能描述 ：获取两时间之间的间隔天数等。
     * @param $start ;开始的时间戳
     * @param $end ;结束的时间戳
     * @param $type ;//支持 day month year hour minute second 年 月 天 时 分 秒
     * @返回类型 int
     */
    public function getTimeBetween($start, $end, $type = 'day')
    {
        $type = strtolower($type);
        switch ($type) {
            case 'day':
                $return = $this->getDay($start, $end);
                break;
            case 'month':
                $return = $this->getMonth($start, $end);
                break;
            case 'year':
                $return = $this->getYear($start, $end);
                break;
            case 'hour':
                $return = $this->getHour($start, $end);
                break;
            case 'minute':
                $return = $this->getMinute($start, $end);
                break;
            case "second":
                $return = $this->getSecond($start, $end);
                break;
            case '天':
                $return = $this->getDay($start, $end);
                break;
            case '月':
                $return = $this->getMonth($start, $end);
                break;
            case '年':
                $return = $this->getYear($start, $end);
                break;
            case '时':
                $return = $this->getHour($start, $end);
                break;
            case '分':
                $return = $this->getMinute($start, $end);
                break;
            case "秒":
                $return = $this->getSecond($start, $end);
                break;
            default :
                $return = false;
        }
        return $return;
    }

    /**
     * @创建人：赵心
     * @功能描述 ：获取天数
     * @返回类型 mixed
     */
    private function getDay($start, $end)
    {
        $start = strtotime(date('Y-m-d', $start));
        $end = strtotime(date('Y-m-d', $end));
        $days = round(($end - $start) / 3600 / 24);
        return $days;
    }

    /**
     * @创建人：赵心
     * @功能描述 ：获取月份
     * @返回类型 int
     */
    private function getMonth($start, $end)
    {
        $start = strtotime(date('Y-m-00', $start));
        $end = strtotime(date('Y-m-00', $end));
        $month = 0;
        while ($start < $end) {
            $start = strtotime('+1 month', $start);

            $month++;
        }
        return $month;
    }

    /**
     * @创建人：赵心
     * @功能描述 ：获取年份
     * @返回类型 mixed
     */
    private function getYear($start, $end)
    {
        $start = date('Y', $start);
        $end = date('Y', $end);
        return $end - $start;
    }

    /**
     * @创建人：赵心
     * @功能描述 ：获取小时
     * @返回类型 mixed
     */
    private function getHour($start, $end)
    {
        $start = strtotime(date('Y-m-d H:00:00', $start));
        $end = strtotime(date('Y-m-d H:00:00', $end));
        //先计算出所有天数
        $day = $this->getDay($start, $end);
        //计算当天的时间戳之差
        $time = $end - strtotime("+{$day} day", $start);
        //当天的剩余小时数
        $day_hour = intval($time / 3600);
        $hour = $day * 24 + $day_hour;
        return $hour;
    }

    /**
     * @创建人：赵心
     * @功能描述 ：获取分钟
     * @返回类型 mixed
     */
    private function getMinute($start, $end)
    {
        $start = strtotime(date('Y-m-d H:i:00', $start));
        $end = strtotime(date('Y-m-d H:i:00', $end));
        //获取小时数
        $hour = $this->getHour($start, $end);
        $time = $end - strtotime("+{$hour} hour", $start);
        $hour_minute = intval($time / 60);
        $minute = $hour * 60 + $hour_minute;
        return $minute;
    }

    /**
     * @创建人：赵心
     * @功能描述 ：获取秒数
     * @返回类型 mixed
     */
    private function getSecond($start, $end)
    {
        $start = strtotime(date('Y-m-d H:i:s', $start));
        $end = strtotime(date('Y-m-d H:i:s', $end));
        return $end - $start;
    }
}
