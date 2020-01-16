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
            return Response::success($note);
        }

    }

}
