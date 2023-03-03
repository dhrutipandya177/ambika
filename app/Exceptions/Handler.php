<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Auth\AuthenticationException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if($request->expectsJson()){
            if($exception instanceof ValidationException){
                $transformed = [];

                foreach ($exception->errors() as $field => $message) {
                    $transformed[$field] = $message[0];
                }
                return response()->json([
                    'success' => false,
                    'errors' => $transformed,
                    'message' => 'The given data was invalid.',
                ], 422);
            }

            if($exception instanceof AccessDeniedHttpException || $exception instanceof AuthorizationException){
                return response()->json([
                    'success' => false,
                    'errors' => new \StdClass(),
                    'message' => $exception->getMessage(),
                ], 403);
            }

            if($exception instanceof MethodNotAllowedHttpException || $exception instanceof ModelNotFoundException || $exception instanceof NotFoundHttpException){
                return response()->json([
                    'success' => false,
                    'errors' => new \StdClass(),
                    'message' => 'Not Found.',
                ], 404);
            }

        }
        return parent::render($request, $exception);
    }

    /**
     * Convert an authentication exception into an unauthenticated response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Auth\AuthenticationException  $e
     * @return \Illuminate\Http\Response
     */
    protected function unauthenticated($request, AuthenticationException $e) {
        if ($request->expectsJson()) {
            return response()->json([
                'success' => false,
                'errors' => new \StdClass(),
                'message' => 'Unauthenticated ! Your session has been expired, Plese Login First.',
            ], 401);

        } else {
            return redirect()->guest(route('login'));
        }
    }
}
