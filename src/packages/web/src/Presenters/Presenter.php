<?php

namespace MyApp\Web\Presenters;

use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

/**
 * Class Presenter
 * @package MyApp\Web\Presenters
 */
abstract class Presenter
{
    /**
     * @param mixed $response
     */
    public function respond($response): void
    {
        if (!$response instanceof Response && !$response instanceof JsonResponse) {
            $response = new Response($response);
        }

        app()->instance('response', $response);
    }
}
