<?php
/**
 * Created by IntelliJ IDEA.
 * User: shinate
 * Date: 2017/11/3
 * Time: 下午4:53
 */

namespace Codante\Binary;


trait ConstructionConverter
{
    private function construction_convert_recursive(&$field) {
        static $_L;
        if (!isset($_L)) {
            $_L = 0;
        }
        if (is_array($field)) {
            $length = 1;
            $member = $field;
            if (isset($field[1]) && $field[1] > -1) {
                $member = $field[0];
                $length = $field[1];
            }
            if (is_array($member)) {
                foreach ($member as & $item) {
                    $this->construction_convert_recursive($item);
                }
            }
            $field = Binary::COLLECTION($member, $length);
        } else {
            $field->OFFSET = '0x' . strtoupper(dechex($_L));
            $_L += $field->byteLength();
        }
    }
}