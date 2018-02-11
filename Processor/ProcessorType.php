<?php
/**
 * Created by IntelliJ IDEA.
 * User: shinate
 * Date: 2017/11/3
 * Time: 下午4:29
 */

namespace Codante\Binary\Processor;


Trait ProcessorType
{
    private static $RAW_FILTER_NONE;
    private static $RAW_FILTER_PACK;
    private static $RAW_FILTER_HEX;

    public static function RAW_FILTER_NONE() {
        self::$RAW_FILTER_NONE = new \stdClass();
    }

    public static function RAW_FILTER_PACK() {
        return self::$RAW_FILTER_PACK ? self::$RAW_FILTER_PACK : self::$RAW_FILTER_PACK = yield;
    }

    public static function RAW_FILTER_HEX() {
        return self::$RAW_FILTER_HEX ? self::$RAW_FILTER_HEX : self::$RAW_FILTER_HEX = yield;
    }
}