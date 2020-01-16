<?php
/**
 * Class ResponseMacroServiceProvider
 * @package App\Providers
 */

namespace App\Providers;

use App\Exceptions\KanSchoolException;
use App\Exceptions\Services\ServiceException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\ValidationException;

/**
 * Сервис-провайдер задающий функциональные макросы для фасада Response
 */
class ResponseMacroServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Response::macro('success', function ($data = array(), $message = 'OK', $code = 200) {
            return Response::json([
                'code'    => $code,
                'status'  => 'success',
                'message' => $message,
                'data'    => (array)$data,
            ], $code);
        });

        Response::macro('notFound', function ($data = array(), $message = 'Not found', $code = 404) {
            return Response::json([
                'code'    => $code,
                'status'  => 'not_found',
                'message' => $message,
                'data'    => (array)$data,
            ], $code);
        });

        Response::macro('error', function ($data = array(), $message = 'Application Error', $code = 400) {
            return Response::json([
                'code'    => $code,
                'status'  => 'error',
                'message' => $message,
                'data'    => (array)$data,
            ], $code);
        });

        Response::macro('fail', function ($data = array(), $message = 'Server Error', $code = 500) {
            return Response::json([
                'code'    => $code,
                'status'  => 'fail',
                'message' => $message,
                'data'    => (array)$data,
            ], $code);
        });

        Response::macro('forbidden', function ($data = array(), $message = 'Access denied', $code = 403) {
            return Response::json([
                'code'    => $code,
                'status'  => 'forbidden',
                'message' => $message,
                'data'    => (array)$data,
            ], $code);
        });

        //TODO посмотреть в сторону в Exceptions/Handler.php, чтобы разгрузить контроллеры
        Response::macro('errorByException', function (\Exception $e, $message = null, $code = 400) {
            $data['err_code'] = $e->getCode();
            if ($e instanceof ValidationException) {
                $message = $message ?: $e->getMessage();
                $data['err_messages'] = $e->errors();
            } else {
                $message = $message ?: $e->getMessage();
                $code = 500;
            }

            return Response::json([
                'code'    => $code,
                'status'  => 'error',
                'message' => $message,
                'data'    => (array)$data,
            ], $code);
        });
    }
}
