<?php
/**
 * Created by IntelliJ IDEA.
 * User: shinate
 * Date: 2017/11/1
 * Time: 下午7:52
 */

namespace Codante\Binary\Type;


use Codante\Binary\Builder;
use Codante\Binary\Parser;

class COLLECTION extends Prototype
{
    protected $LENGTH = 1;

    protected $MEMBER;

    private $_SINGLE_MEMBER = false;

    public function __construct($member, $length = 1) {
        parent::__construct($length);
        $this->MEMBER = $member;
        $this->_SINGLE_MEMBER = !is_array($this->MEMBER);
    }

    public function parse(Parser &$parser) {
        $ret = [];
        for ($i = 0; $i < $this->LENGTH; $i++) {
            $ret[] = $this->_SINGLE_MEMBER
                ? $parser->field($this->MEMBER)
                : array_map([
                    $parser,
                    'field',
                ], $this->MEMBER);
        }

        return $this->LENGTH === 1 ? $ret[0] : $ret;
    }

    public function build(Builder &$builder, &$data) {
        if ($this->LENGTH === 1) {
            $this->_SINGLE_MEMBER
                ? $builder->field($this->MEMBER, $data)
                : array_walk($data, function (&$item, $key) use (&$builder) {
                $builder->field($this->MEMBER[$key], $item);
            });
        } else {
            for ($i = 0; $i < $this->LENGTH; $i++) {
                $this->_SINGLE_MEMBER
                    ? $builder->field($this->MEMBER, $data[$i])
                    : array_walk($data[$i], function (&$item, $key) use (&$builder) {
                    $builder->field($this->MEMBER[$key], $item);
                });
            }
        }
    }

    public function member() {
        return $this->MEMBER;
    }

    public function byteLength() {
        $len = 0;
        for ($i = 0; $i < $this->LENGTH; $i++) {
            if (is_array($this->MEMBER)) {
                foreach ($this->MEMBER as $member) {
                    if ($member instanceof static) {
                        $len += $member->byteLength();
                    } else {
                        $len += $member->length();
                    }
                }
            } else {
                $len += $this->MEMBER->length();
            }
        }

        return $len;
    }
}