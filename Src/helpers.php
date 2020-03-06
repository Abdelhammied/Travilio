<?php

/**
 * Die And Dump Request Like Laravel Behaviuor
 * 
 * Used While Development
 */
if (!function_exists('dd')) {
    function dd($data)
    {
        echo '<pre>';
        die(var_dump($data));
        echo '</pre>';
    }
}

/**
 * Map Provider Response 
 * 
 * @return string
 */
if (!function_exists('map')) {
    function map($object, $key)
    {
        return $object->mapResponse[$key];
    }
}

/**
 * Return Response As Json
 * 
 * @return void
 */
if (!function_exists('response')) {
    function response($data)
    {
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}

/**
 * Handle Starts Response
 *  
 * @return int
 */
if (!function_exists('handleStarsResponse')) {
    function handleStarsResponse($starts)
    {
        return strlen($starts);
    }
}
