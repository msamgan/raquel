<?php

if (!function_exists('getQuery')) {
    /**
     * @param $queryName
     * @param null $data
     * @return array|false|string|string[]
     */
    function getQuery($queryName, $data = null)
    {
        $query = file_get_contents(storage_path('queries/' . $queryName . '.sql'));

        if ($data) {
            foreach ($data as $key => $value) {
                $query = str_replace($key, $value, $query);
            }
        }

        return $query;
    }
}
