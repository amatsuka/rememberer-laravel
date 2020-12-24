<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
/**
 * @OA\OpenApi(
 *     servers={
 *     },
 *     @OA\Info(
 *         version="1.0.0",
 *         title="",
 *         description="",
 *         termsOfService="",
 *         @OA\Contact(
 *             email=""
 *         ),
 *         @OA\License(
 *             name="Private License",
 *             url="URL to the license"
 *         )
 *     ),
 *     @OA\ExternalDocumentation(
 *         description="",
 *         url=""
 *     ),
 *
 * @OA\Schema(
 *     ref="response_404",
 *     required={"message"},
 *     @OA\Property(property="message", type="string", example="Ошибка: Не найдено", description="Сообщение об ошибке"),
 *     @OA\Property(property="errors", type="object", example={"code": "404", "status": "not_found", "message": "Заметка не найдена"}, description="Возникает когда заметка не найдена или требуется пароль")
 * )
 * )
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
