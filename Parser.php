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
    use ConstructionConverter;

    private $CONST = [];

    private $DATA = [];

    private $STREAM;

    public function __construct($construction = [], Stream $stream = null) {
        $this->CONST = $construction;
        $this->construction_convert_recursive($this->CONST);
        if ($stream) {
            $this->parse($stream);
        }
    }

    public function byteLength() {
        return $this->CONST->byteLength();
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

    public function field(&$field) {
        return $field->parse($this);
    }

    private function is_assoc(array $arr) {
        if ([] === $arr) {
            return false;
        }

        return array_keys($arr) !== range(0, count($arr) - 1);
    }
}