<?php

namespace App\controllers;

class ErrorController
{
    /**
     * Show the 404 page
     *
     * @return void
     */
    public static function show404($message = 'Resource not found')
    {
        http_response_code(404);

        loadView('error', ['statusCode' => '404', 'message' => $message]);
    }

    /**
     * Show the 403 page
     *
     * @return void
     */

    public static function show403($message = 'Your are not authorized to view this page')
    {
        http_response_code(403);
        loadView('error', ['statusCode' => '403', 'message' => $message]);
    }

    /**
     * Show the 500 page
     *
     * @return void
     */

    public static function show500($message = 'Internal server error')
    {
        http_response_code(500);
        loadView('error', ['statusCode' => '503', 'message' => $message]);
    }

    /**
     * Show the 503 page
     *
     * @return void
     */
    public static function show503($message = 'Service unavailable')
    {
        http_response_code(503);
        loadView('error', ['statusCode' => '503', 'message' => $message]);
    }
}
