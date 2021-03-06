<?php
/**
 * Created by IntelliJ IDEA.
 * User: shinate
 * Date: 2017/11/1
 * Time: 下午7:48
 */

namespace Codante\Binary;

use Codante\Binary\Type\TypeTrait;

/**
 * Class Binary
 * @package Codante\Binary
 */
class Binary
{
    use TypeTrait;

    const RAW_FILTER_NONE = -1;

    const RAW_FILTER_PACK = -2;

    const RAW_FILTER_HEX = -3;

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