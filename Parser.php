<?php
/**
 * Created by IntelliJ IDEA.
 * User: shinate
 * Date: 2017/11/1
 * Time: 下午8:22
 */

namespace Codante\Binary;


use Codante\Binary\Type\COLLECTION;

class Parser
{
    private $CONST = [];

    private $DATA = [];

    private $STREAM;

    public function __construct($construction = [], $stream = null) {
        $this->CONST = $construction;
        if ($stream && $stream instanceof Stream) {
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

    public function field($field) {

        if (is_array($field)) {
            $length = 1;
            if (isset($field[0]) && is_array($field[0]) && isset($field[1]) && $field[1] > -1) {
                $length = $field[1];
                $field = $field[0];
            }
            $field = Binary::COLLECTION($field, $length);
        }

        return $field->parse($this);
    }

    public function stream() {
        return $this->STREAM;
    }

    private function is_assoc(array $arr) {
        if ([] === $arr) {
            return false;
        }

        return array_keys($arr) !== range(0, count($arr) - 1);
    }
}