<?php

if (!function_exists('array_to_object')) {

    /**
     * Convert Array into Object in deep
     *
     * @param array $array
     * @return
     */
    function array_to_object($array)
    {
        return json_decode(json_encode($array));
    }
}

if (!function_exists('empty_fallback')) {

    /**
     * Empty data or null data fallback to string -
     *
     * @return string
     */
    function empty_fallback ($data)
    {
        return ($data) ? $data : "-";
    }
}

if (!function_exists('currency_format')) {

    /**
     * Currency format
     *
     * @return string
     */
    function currency_format ($price)
    {
        return 'Rp'.number_format($price,0, '.', ',');
    }
}

if (!function_exists('is_field_empty')) {

    /**
     * detect when string doesnt have default value
     *
     * @return object
     */
    function is_field_empty (array $array)
    {
        $i = 0;
        foreach ($array as $key => $value) {
            $i++;
            if ($value != null) {
                continue;
            }
            return array_to_object([
                'status' => 'failed',
                'message' => 'Requirement not available at row '.$i.'/'.count($array),
            ]);
        }

    }
}


