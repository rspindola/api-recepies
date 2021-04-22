<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\QueryException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Throwable;

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
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->renderable(function (AuthenticationException $exception, $request) {
            return response('Acesso Negado!', 401);
        });

        $this->renderable(function (QueryException $exception, $request) {
            return response('Erro interno, por favor entre em contato com o administrador!', 500);
        });

        $this->renderable(function (Throwable $exception, $request) {
            if ($request->expectsJson()) {
                $message = $exception->getMessage() ?? 'Erro ao realizar a operação!';
                if ($exception instanceof HttpException) {
                    $code = $exception->getStatusCode() === 0 ? 500 : $exception->getStatusCode();
                } else {
                    $code = $exception->getCode() === 0 ? 500 : $exception->getCode();
                }

                if (get_class($exception) === 'Symfony\Component\HttpKernel\Exception\NotFoundHttpException') {
                    $message = 'A URL não foi encontrada!';
                }

                $response = [];
                $response['message'] = $message;
                $response['code'] = $code;
                $response['status'] = false;
                $response['url'] = $request->url();
                if ($exception instanceof ValidationException) {
                    $response['message'] = 'Os dados fornecidos não são válidos!';
                    $response['details'] = $exception->errors();
                }

                // Escrevendo erro no log
                logger()->error(json_encode($response));

                return response($response, $code);
            } else {
                if (!env('APP_DEBUG')) {
                    $redirect = url()->previous() ?? '/';
                    if (preg_match('/\/login/', $redirect)) {
                        return redirect('/');
                    }

                    if ($exception instanceof ValidationException) {
                        return redirect($redirect)->withError('Erro na validação dos campos!')->withErrors($exception->errors());
                    } else {
                        return redirect($redirect)->withError($exception->getMessage());
                    }
                }
            }
        });
    }
}
