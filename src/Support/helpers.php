<?php 
/**
 * Helper functions.
 * 
 * @author dligthart
 * @package example
 */

/**
 * In Array Recursive.
 *
 * @param [type] $needle
 * @param [type] $haystack
 * @param boolean $strict
 * @return boolean
 */
function in_array_r($needle, $haystack, $strict = false): bool {
    foreach ($haystack as $item) {
        if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && in_array_r($needle, $item, $strict))) {
            return true;
        }
    }

    return false;
}