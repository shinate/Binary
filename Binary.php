<?php
/**
 * Created by IntelliJ IDEA.
 * User: shinate
 * Date: 2017/11/1
 * Time: 下午7:48
 */

namespace Codante\Binary;

use \ReflectionClass;

class Binary
{

    const RAW_FILTER_NONE = 0;

    const RAW_FILTER_PACK = 1;

    const RAW_FILTER_HEX = 2;

    //
    //    public static function __callStatic($name, $arguments) {
    //        // TODO: Implement __callStatic() method.
    //        return (new ReflectionClass(__NAMESPACE__ . '\\Type\\' . $name))->newInstanceArgs($arguments);
    //    }

    private static function TypeInstantiator($name, $arguments) {
        return (new ReflectionClass(__NAMESPACE__ . '\\Type\\' . $name))->newInstanceArgs($arguments);
    }

    public static function SIGNED_SHORT() {
        return self::TypeInstantiator(__FUNCTION__, func_get_args());
    }

    public static function UNSIGNED_SHORT() {
        return self::TypeInstantiator(__FUNCTION__, func_get_args());
    }

    public static function UNSIGNED_INTEGER() {
        return self::TypeInstantiator(__FUNCTION__, func_get_args());
    }

    public static function SIGNED_CHAR() {
        return self::TypeInstantiator(__FUNCTION__, func_get_args());
    }

    public static function UNSIGNED_CHAR() {
        return self::TypeInstantiator(__FUNCTION__, func_get_args());
    }

    public static function COLLECTION() {
        return self::TypeInstantiator(__FUNCTION__, func_get_args());
    }

    public static function Parser($construction = [], Stream $stream = null) {
        return new Parser($construction, $stream);
    }

    public static function Builder($construction = [], $data = null) {
        return new Builder($construction, $data);
    }

    public static function Stream($bin = '') {
        return new Stream($bin);
    }
}