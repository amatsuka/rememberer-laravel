<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\NoteService;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Session;
use App\Exceptions\NoteNotStoredException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class NoteController extends Controller
{

    /**
     * @var NoteService
     */
    private  $noteService;

    public function __construct(NoteService $noteService)
    {
        $this->noteService = $noteService;
    }

    public function store(Request $request)
    {
        try {
            $note = $this->noteService->store($request->all());
        } catch(NoteNotStoredException $ex) {
            return view('/')->with('message', [
                'type' => 'error',
                'text' => $ex->getMessage()
            ]);
        }

        $url = URL::to('/view/' . $note->t_code);

        return redirect(route('index'))
        ->with('message', [
            'type' => 'success',
            'text' => __('messages.phrase_to_get') . ": <b>{$note->code}</b><br/> " .  __('messages.link') . ": <a href='{$url}'>{$url}</a>"
            ]);
     }

    public function view(Request $request)
    {
        $note = null;

        if ($request->get('code') != null) {
            if ($request->has('password') && $request->get('password') != null) {
                $note = $this->noteService->findByCodeAndPassword($request->get('code'), $request->get('password'));
            } elseif ($request->has('code')) {
                $note = $this->noteService->findByCode($request->get('code'));
            }
        }

        if ($note == null) {
            return redirect(route('index'))->with('message', [
                'type' => 'need_pass',
                'text' => __('messages.note_not_found')
            ])->with('code', $request->get('code'));
        }

        return view('notes.view')->with('note', $note)->with('code', $request->get('code'));
    }

    public function viewDirectly(string $code)
    {
        $note = $this->noteService->findByCodeIgnorePassword($code);

        if ($note == null) {
            throw new NotFoundHttpException();
        }

        if ($note->password_hash == null) {
            return view('notes.view')->with('code', null)->with('note', $note);
        } else {
            return redirect('/')->with('message', [
                'type' => 'need_pass',
                'text' => __('messages.note_not_found')
            ])->with('code', $note->code);
        }
    }

    public function index(Request $request)
    {
        return view('notes.index', ['message' => Session::get('message'), 'code' => Session::get('code')]);
    }
}
