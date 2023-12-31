<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
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

    public function render($request, $exception)
    {
        if ( $request->is('api/*') ) {
            if($this->isHttpException($exception)){
                return response()->json([
                    'error_code' => $exception->getStatusCode(),
                    'errors' => $exception->getMessage()
                ], $exception->getStatusCode());
            }
            return response()->json([
                'error_code' => Response::HTTP_BAD_REQUEST,
                'errors' => $exception->getMessage()
            ], Response::HTTP_BAD_REQUEST);
        }
        return parent::render($request, $exception);
    }
}
