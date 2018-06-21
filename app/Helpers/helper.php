<?php

if (!function_exists('prepareForSelect')) {

    function prepareForSelect(Illuminate\Database\Eloquent\Collection $collection)
    {

        $array = [];
        foreach ($collection as $item) {

            $array[$item->id] = $item->name;
        }

        return $array;

    }
}