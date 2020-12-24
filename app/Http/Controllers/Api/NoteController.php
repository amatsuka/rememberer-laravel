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
     *     path="/api/notes",
     *     tags={"Заметки"},
     *     @OA\Parameter(
     *          name="body",
     *          in="body",
     *          @OA\Schema(
     *              type="object",
     *              required={"text", "lang", "password"},
     *              @OA\Property(property="text"),
     *              @OA\Property(property="password"),
     *              @OA\Property(property="lang"),
     *              @OA\Property(property="parent_code")
     *          )
     *     ),
     *     @OA\Response(response="200", description="Success", @OA\Schema(
     *                                                              type="object",
     *                                                              @OA\Property(property="code"),
     *                                                              @OA\Property(property="status"),
     *                                                              @OA\Property(property="message")
     *          )
     *      )
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
     *     path="/api/notes/find",
     *     tags={"Заметки"},
     *     @OA\Parameter(
     *         name="body",
     *         in="body",
     *     @OA\Schema(
     *              type="object",
     *              required={"code"},
     *              @OA\Property(property="code"),
     *              @OA\Property(property="password"),
     *          )
     *     ),
     *     @OA\Response(response="200", description="Success", @OA\Schema(ref="#/definitions/Note")),
     *     @OA\Response(response="404", description="Not found", @OA\Schema(ref="#/definitions/response_404"))
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
