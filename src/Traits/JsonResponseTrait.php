<?php

namespace App\Traits;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * @package App\Traits
 */
trait JsonResponseTrait
{
    /**
     * @param Request $request
     * @return bool|mixed
     */
    protected function getJson(Request $request)
    {
        $data = json_decode($request->getContent(), true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            return false;
            // throw new HttpException(JsonResponse::HTTP_BAD_REQUEST, 'Invalid json');
        }

        return $data;
    }

    /**
     * @param int $statusCode
     * @param string $message
     * @param array $extra
     * @return JsonResponse
     */
    protected function okJsonResponse(
        $extra = [],
        $statusCode = JsonResponse::HTTP_OK,
        $message = 'Ok'
    ): JsonResponse {
        $data = [
            'statusCode' => $statusCode,
            'message' => $message,
        ];

        return !empty($extra)
            ? new JsonResponse(array_merge($data, ['extra' => $extra]))
            : new JsonResponse($data);
    }

    /**
     * @param int $statusCode
     * @param string $message
     * @return JsonResponse
     */
    protected function errorJsonResponse(
        $statusCode = JsonResponse::HTTP_BAD_REQUEST,
        $message = 'Something went wrong. Please try again.'
    ): JsonResponse {
        return new JsonResponse([
            'statusCode' => $statusCode,
            'message' => $message,
        ]);
    }
}
