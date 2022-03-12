<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $exception)
    {
        if ($request->wantsJson()) {
            if ($exception instanceof ModelNotFoundException)
                return response()->json(['message' => __('custom.not_found')], Response::HTTP_NOT_FOUND);

            if ($exception instanceof QueryException) {
                $message = $exception->errorInfo[2] ?? __('custom.default');
                $errno = 500;

                switch ($exception->errorInfo[1]) {
                    case 1062:
                        $message = __('custom.duplicate');
                        $errno = Response::HTTP_UNPROCESSABLE_ENTITY;
                        break;
                }

                return response()->json(['message' => $message], $errno);
            }

            if ($exception instanceof ValidationException) {
                $message = '';

                foreach ($exception->errors() as $val)
                    $message .= $val[0] . ' ';

                return response()->json(['message' => trim($message)], Response::HTTP_UNPROCESSABLE_ENTITY);
            }

            return response()->json(['message' => $exception->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return parent::render($request, $exception);
    }
}
