<?php
/**
 * Created by IntelliJ IDEA.
 * User: shinate
 * Date: 2017/11/1
 * Time: 下午8:40
 */

namespace Codante\Binary;


class Stream
{

    private $BINARY_STRING = '';

    private $LENGTH = 0;

    private $POINTER = 0;

    public function __construct($bin = '') {
        if ($this->isBinary($bin)) {
            $this->BINARY_STRING = $bin;
            $this->LENGTH = strlen($bin);
        }
    }

    public function __toString() {
        // TODO: Implement __toString() method.
        return $this->all();
    }

    private function isBinary($str) {
        return preg_match('/[^\x20-\x7E\t\r\n]/', $str) > 0;
    }

    public function all() {
        return $this->BINARY_STRING;
    }

    public function seek($point) {
        return $this->POINTER = $point;
    }

    public function read($len = 0) {
        try {
            return substr($this->BINARY_STRING, $this->POINTER, $len);
        } finally {
            $this->seek($this->POINTER + $len);
        }
    }

    public function aread($start = 0, $len = 0) {
        return substr($this->BINARY_STRING, $start, $len);
    }

    public function iread($start = 0, $end = 0) {
        return substr($this->BINARY_STRING, $start, $end - $start);
    }

    public function byteLength() {
        return $this->LENGTH;
    }

    public function write($str, $len = -1) {
        if ($len > -1) {
            $str = substr($str, 0, $len);
        }
        $len = strlen($str);
        $this->BINARY_STRING .= $str;
        $this->LENGTH += $len;
        $this->seek($this->POINTER + $len);
    }
}