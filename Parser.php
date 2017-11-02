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

    public function __construct($construction = []) {
        $this->CONST = $construction;
    }

    public function parse(Stream $stream) {

    }

    public function each(&$arr, &$stream) {
        foreach ($arr as $key => $value) {

        }
    }
}