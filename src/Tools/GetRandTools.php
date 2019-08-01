<?php


namespace App\Tools;

/**
 * 工具类 double类型数据操作
 * Class FloatTools
 * @package App\Tools
 */
class GetRandTools
{
    public static function getRandStringZh($num): string
    {
        $chinese = '';
        for ($i = 0; $i < $num; $i++) {
            // 使用chr()函数拼接双字节汉字，前一个chr()为高位字节，后一个为低位字节
            $a = chr(mt_rand(0xB0, 0xD0)) . chr(mt_rand(0xA1, 0xF0));
            // 转码
            $chinese .= iconv('GB2312', 'UTF-8', $a);
        }
        return $chinese;
    }

    /**
     * 生成随机的float值
     * Author: roger peng
     * Time: 2019-07-31 09:42
     * @param int $min
     * @param int $max
     * @return float
     */
    public static function getRandFloat($min = 0, $max = 1): float
    {
        return $min + mt_rand() / mt_getrandmax() * ($max - $min);
    }

    /**
     * 获取一个随机的性别数值,随手写的 不保证好用
     * Author: roger peng
     * Time: 2019-07-30 11:31
     * @return int
     */
    public static function getRandSex(): int
    {
        try {
            $random = random_int(0, 2);
        } catch (\Exception $exception) {
            $random = 2;
        }

        return $random;
    }

    /**
     * 随机生成一个身份证号码(不保证唯一性,手写的获取18位长度纯数字字符串)
     * Author: roger peng
     * Time: 2019-07-30 11:22
     * @return string
     */
    public static function getRandIdCard(): string
    {
        $range = range(0, 9);

        $array = [];
        for ($i = 0; $i < 18; $i++) {
            $array[] = array_rand($range);
        }

        return implode("", $array);
    }

    /**
     * 获取一个身高整形数据
     * Author: roger peng
     * Time: 2019-07-31 09:47
     * @return int
     */
    public static function getRandHeight(): int
    {
        try {
            $random = random_int(170, 175);
        } catch (\Exception $exception) {
            $random = 171;
        }

        return $random;
    }

    /**
     * 获取一个体重整形数据
     * Author: roger peng
     * Time: 2019-07-31 09:47
     * @return int
     */
    public static function getRandWeight(): int
    {
        try {
            $random = random_int(40, 50);
        } catch (\Exception $exception) {
            $random = 42;
        }

        return $random;
    }
}