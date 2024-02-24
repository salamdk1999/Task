<?php

namespace App\DTO;

use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class GetResponseData
{
    /**
     * Get a ResponseData object with the provided data, message, and status.
     *
     * @param mixed $data
     * @param string $message
     * @param int $status
     * @return ResponseData
     * @throws UnknownProperties
     */
    public static function getResponseData(mixed $data, string $message, int $status): ResponseData
    {
        return new ResponseData([
            'data' => $data ? (is_array($data) ? $data : $data->toArray()) : [],
            'message' => $message,
            'status' => $status,
        ]);
    }

    /**
     * Get a ResponseData object with the provided data, token, message, and status.
     *
     * @param mixed $data
     * @param string|null $token
     * @param string $message
     * @param int $status
     * @return ResponseData
     * @throws UnknownProperties
     */
    public static function getAuthResponseData(mixed $data, ?string $token, string $message, int $status): ResponseData
    {
        return new ResponseData([
            'data' => $data ? (is_array($data) ? $data : $data->toArray()) : [],
            'token' => $token,
            'message' => $message,
            'status' => $status,
        ]);
    }
}