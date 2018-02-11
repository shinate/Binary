<?php
/**
 * Created by IntelliJ IDEA.
 * User: shinate
 * Date: 2017/11/3
 * Time: 下午4:32
 */

namespace Codante\Binary\Type;

use \ReflectionClass;

trait TypeTrait
{
    private static function TypeInstantiator(string $name, array $arguments = []) {
        return (new ReflectionClass(__NAMESPACE__ . '\\' . $name))->newInstanceArgs($arguments);
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

}