<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

/**
 * Class Controller
 * @package App\Http\Controllers
 */
class Controller extends BaseController
{
    use AuthorizesRequests;
    use DispatchesJobs;

    /**
     * @param $message
     * @return JsonResponse
     */
    public function message($message)
    {
        return response()->json([
            'message' => $message,
        ]);
    }

    /**
     * @param $data
     * @return JsonResponse
     */
    public function customResponse($data)
    {
        return response()->json([
            'data' => $data,
        ]);
    }
}
