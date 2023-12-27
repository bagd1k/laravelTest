<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
/**
 * @OA\OpenApi(
 *     @OA\Info(
 *         version="0.1",
 *         title="Laravel x Swagger test",
 *         description="Lorem ipsum...."
 *     ),
 *     @OA\Server(
 *         description="Local server",
 *         url="http://127.0.0.1:8000"
 *     )
 * )
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs;
}
