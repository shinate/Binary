<?php
/**
 * Created by IntelliJ IDEA.
 * User: shinate
 * Date: 2017/11/3
 * Time: 下午4:32
 */

namespace Codante\Binary\Type;


trait CharTrait
{
    public function unpack($raw) {
        return array_values(unpack($this->PACK_FORMAT, $raw));
    }

    public function dechex($raw) {
        return call_user_func_array('vsprintf', [str_repeat('%02X', $this->LENGTH), $this->unpack($raw)]);
    }

    public function pack($data) {
        return call_user_func_array('pack', array_merge([$this->PACK_FORMAT], array_values($data)));
    }

    public function hexdec($data) {
        return $this->pack(array_map(function ($item) {
            return hexdec($item);
        }, str_split($data, 2)));
    }
}