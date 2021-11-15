<?php

use Illuminate\Support\Facades\DB;

if (!function_exists('getQuery')) {
    /**
     * @param $queryName
     * @param null $data
     * @return array|false|string|string[]
     */
    function getQuery($queryName, $data = null)
    {
        $query = file_get_contents(storage_path('app/queries/' . $queryName . '.sql'));

        if ($data) {
            foreach ($data as $key => $value) {
                $query = str_replace($key, $value, $query);
            }
        }

        return $query;
    }
}

if (!function_exists('getQueryData')) {
    /**
     * @param $queryName
     * @param null $data
     * @return array
     */
    function getQueryData($queryName, $data = null): array
    {
        return DB::select(getQuery($queryName, $data));
    }
}
