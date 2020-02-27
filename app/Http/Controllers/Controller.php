<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
/**
 * @SWG\Swagger(
 *     schemes={"https"},
 *     host="getremember.com",
 *     basePath="/",
 *     @SWG\Info(
 *         version="1.0.0",
 *         title="",
 *         description="",
 *         termsOfService="",
 *         @SWG\Contact(
 *             email=""
 *         ),
 *         @SWG\License(
 *             name="Private License",
 *             url="URL to the license"
 *         )
 *     ),
 *     @SWG\ExternalDocumentation(
 *         description="",
 *         url=""
 *     ),
 *
 * @SWG\Definition(
 *     definition="response_404",
 *     required={"message"},
 *     @SWG\Property(property="message", type="string", example="Ошибка: Не найдено", description="Сообщение об ошибке"),
 *     @SWG\Property(property="errors", type="object", example={"code": "404", "status": "not_found", "message": "Заметка не найдена"}, description="Возникает когда заметка не найдена или требуется пароль")
 * )
 * )
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
