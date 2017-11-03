<?php
/**
 * Created by IntelliJ IDEA.
 * User: shinate
 * Date: 2017/11/1
 * Time: 下午8:22
 */

namespace Codante\Binary;

class Parser
{
    private $CONST = [];

    private $DATA = [];

    private $STREAM;

    public function __construct($construction = [], Stream $stream = null) {
        $this->CONST = $construction;
        if ($stream) {
            $this->parse($stream);
        }
    }

    public function parse(Stream $stream) {
        $this->STREAM = $stream;

        return $this->DATA = $this->field($this->CONST);
    }

    public function data() {
        return $this->DATA;
    }

    public function stream() {
        return $this->STREAM;
    }

    public function field($FTI) {

        if (is_array($FTI)) {
            $length = 1;
            $member = $FTI;
            if (isset($FTI[1]) && $FTI[1] > -1) {
                $member = $FTI[0];
                $length = $FTI[1];
            }
            $FTI = Binary::COLLECTION($member, $length);
        }

        return $FTI->parse($this);
    }

    private function is_assoc(array $arr) {
        if ([] === $arr) {
            return false;
        }

        return array_keys($arr) !== range(0, count($arr) - 1);
    }
}