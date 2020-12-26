<?php


namespace App\Http\Controllers\Api;


use App\Exceptions\NoteNotStoredException;
use App\Services\NoteService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Response;

class NoteController
{

    /**
     * @var NoteService
     */
    private $noteService;

    public function __construct(NoteService $noteService)
    {
        $this->noteService = $noteService;
    }

    /**
     * Создать заметку. Поле password не обязательное но должно присутствовать в запросе (передавать пустую строку).
     *
     * @OA\Post(
     * path="/api/notes",
     * summary="Создать заметку",
     * description="Создать заметку. Поле password не обязательное но должно присутствовать в запросе (передавать пустую строку).",
     * @OA\RequestBody(
     *    required=true,
     *    description="Поля заметки",
     *    @OA\JsonContent(
     *       required={"text", "lang", "password"},
     *       @OA\Property(property="text", type="string", example="Какой-то текст заметки"),
     *       @OA\Property(property="password", type="string", example="PassWord12345"),
     *       @OA\Property(property="lang", type="string", example="javascript"),
     *       @OA\Property(property="parent_code", type="integer", example="100")
     *    ),
     * ),
     * @OA\Response(
     *    response=200,
     *    description="Success",
     *    @OA\JsonContent(
     *       @OA\Property(property="code", type="string", example="200"),
     *       @OA\Property(property="status", type="string", example="success"),
     *       @OA\Property(property="message", type="string", example="")
     *        )
     *     )
     * )
     */
    public function store(Request $request)
    {
        try {
            $note = $this->noteService->store($request->all());
        } catch (NoteNotStoredException $ex) {
            return Response::errorByException($ex);
        }

        $url = URL::to('/view/' . $note->t_code);
        $mess = __('messages.phrase_to_get') .
            ": <b>{$note->code}</b><br/> "
            . __('messages.link')
            . ": <a href='{$url}'>{$url}</a>";

        return Response::success([], $mess);
    }

    /**
     * Получить заметку по коду
     *
     * @OA\Post(
     * path="/api/notes/find",
     * summary="Найти заметку",
     * description="Получить заметку по коду",
     * @OA\RequestBody(
     *    required=true,
     *    description="Поля заметки",
     *    @OA\JsonContent(
     *       required={"code"},
     *       @OA\Property(property="code", type="string", example="Код заметки"),
     *       @OA\Property(property="password", type="string", example="PassWord12345"),
     *    ),
     * ),
     * @OA\Response(
     *    response=200,
     *    description="Success",
     *    @OA\JsonContent(
     *       @OA\Property(property="code", type="string", example="200"),
     *       @OA\Property(property="status", type="string", example="success"),
     *       @OA\Property(property="message", type="string", example=""),
     *       @OA\Property(property="data", type="object", ref = "#/components/schemas/Note")
     *        )
     *     )
     * )
     * @OA\Response(
     *    response=404,
     *    description="Not found",
     *    @OA\JsonContent(
     *       @OA\Property(property="code", type="string", example="404"),
     *       @OA\Property(property="status", type="string", example="not_found"),
     *       @OA\Property(property="message", type="string", example="Заметка не найдена")
     *        )
     *     )
     * )
     */
    public function find(Request $request)
    {
        $note = null;

        if ($request->has('password') && $request->get('password') != null) {
            $note = $this->noteService->findByCodeAndPassword($request->get('code'), $request->get('password'));
        } else {
            $note = $this->noteService->findByCode($request->get('code'));
        }

        if ($note == null) {
            return Response::notFound([], __('messages.note_not_found'));
        } else {
            return Response::success($note->toArray());
        }

    }

}
