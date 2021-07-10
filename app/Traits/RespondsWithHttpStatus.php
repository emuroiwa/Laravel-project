<?php
namespace App\Traits;

trait RespondsWithHttpStatus
{    
    /**
     * success
     *
     * @param  string $message
     * @param  array $data
     * @param  int $status
     * @return void
     */
    protected function success(string $message, array $data = [], int $status = 200)
    {
        return response([
            'success' => true,
            'data' => $data,
            'message' => $message,
        ], $status);
    }
    
    /**
     * failure
     *
     * @param  string $message
     * @param  int $status
     * @return void
     */
    protected function failure(string $message, int $status = 422)
    {
        return response([
            'success' => false,
            'message' => $message,
        ], $status);
    }
}