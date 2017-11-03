<?php
/**
 * Created by IntelliJ IDEA.
 * User: shinate
 * Date: 2017/11/1
 * Time: 下午7:52
 */

namespace Codante\Binary\Type;


class UNSIGNED_CHAR extends Prototype
{
    protected $LENGTH = 4;

    protected $PACK_FORMAT = 'C*';

    public function unpack($raw) {
        return array_values(unpack($this->PACK_FORMAT, $raw));
    }

    public function hex($raw) {
        return call_user_func_array('vsprintf', [str_repeat('%02X', $this->LENGTH), $this->unpack($raw)]);
    }
}