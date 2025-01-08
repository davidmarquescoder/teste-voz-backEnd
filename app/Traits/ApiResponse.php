<?php

namespace App\Traits;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;

trait ApiResponse
{
    /**
     * Return a success JSON response.
     *
     * @param string                                                   $message
     * @param Model|Collection|JsonResource|LengthAwarePaginator|array $data
     * @param int                                                      $code
     *
     * @return JsonResponse
     */
    protected function success(string $message, Model|Collection|JsonResource|LengthAwarePaginator|array $data = [], int $code = 200): JsonResponse
    {
        return response()->json(
            data: [
                'message' => $message,
                'data'    => $data
            ],
            status: $code
        );
    }

    /**
     * Return an error JSON response.
     *
     * @param string $message
     * @param array  $data
     * @param int    $code
     *
     * @return JsonResponse
     */
    protected function error(string $message, array $data = [], int|string $code = 500): JsonResponse
    {
        if (!$code || $code < 100 || !is_int(value: $code)) {
            $code = 500;
        }

        return response()->json(
            data: [
                'message' => $message,
                'data'    => $data
            ],
            status: $code
        );
    }
}
