<?php
/**
 * Created by IntelliJ IDEA.
 * User: shinate
 * Date: 2017/11/1
 * Time: 下午7:52
 */

namespace Codante\Binary\Type;


class UNSIGNED_INTEGER extends Prototype
{
    protected $LENGTH = 4;

    protected $pack_format = 'I';

    public function unpack($raw) {
        return array_values(unpack($this->pack_format, $raw))[0];
    }

    public function hex($raw) {
        return call_user_func_array('vsprintf', ['%08X', $this->unpack($raw)]);
    }
}