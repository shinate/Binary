<?php
/**
 * Created by IntelliJ IDEA.
 * User: shinate
 * Date: 2017/11/1
 * Time: 下午7:52
 */

namespace Codante\Binary\Type;


use Codante\Binary\Parser;

class COLLECTION extends Prototype
{
    protected $LENGTH = 1;

    protected $MEMBER;

    public function __construct($member, $length = 1) {
        parent::__construct($length);
        $this->MEMBER = $member;
    }

    public function parse(Parser &$parser) {
        $ret = [];
        $fields = is_array($this->MEMBER);
        for ($i = 0; $i < $this->LENGTH; $i++) {
            $ret[] = $fields ? array_map([$parser, 'field'], $this->MEMBER) : $parser->field($this->MEMBER);
        }

        return $this->LENGTH === 1 ? $ret[0] : $ret;
    }
}