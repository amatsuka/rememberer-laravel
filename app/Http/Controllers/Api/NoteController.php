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
     * @SWG\Post(
     *     path="/api/notes",
     *     tags={"Заметки"},
     *     @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          @SWG\Schema(
     *              type="object",
     *              required={"text", "lang", "password"},
     *              @SWG\Property(property="text"),
     *              @SWG\Property(property="password"),
     *              @SWG\Property(property="lang"),
     *          )
     *     ),
     *     @SWG\Response(response="200", description="Success", @SWG\Schema(
     *                                                              type="object",
     *                                                              @SWG\Property(property="code"),
     *                                                              @SWG\Property(property="status"),
     *                                                              @SWG\Property(property="message")
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
     * @SWG\Post(
     *     path="/api/notes/find",
     *     tags={"Заметки"},
     *     @SWG\Parameter(
     *         name="body",
     *         in="body",
     *     @SWG\Schema(
     *              type="object",
     *              required={"code"},
     *              @SWG\Property(property="code"),
     *              @SWG\Property(property="password"),
     *          )
     *     ),
     *     @SWG\Response(response="200", description="Success", @SWG\Schema(ref="#/definitions/Note")),
     *     @SWG\Response(response="404", description="Not found", @SWG\Schema(ref="#/definitions/response_404"))
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
