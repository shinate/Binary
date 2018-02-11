<?php
/**
 * Created by IntelliJ IDEA.
 * User: shinate
 * Date: 2017/11/3
 * Time: 下午4:32
 */

namespace Codante\Binary\Processor;

trait NUMBIC
{
    public function pack($data) {
        return pack($this->PACK_FORMAT, $data);
    }

    public function unpack($raw) {
        return array_values(unpack($this->PACK_FORMAT, $raw))[0];
    }

    public function hexdec($data) {
        return $this->pack(hexdec($data));
    }

    public function dechex($raw) {
        return call_user_func_array('vsprintf', ['%0' . (2 * $this->LENGTH) . 'X', $this->unpack($raw)]);
    }
}