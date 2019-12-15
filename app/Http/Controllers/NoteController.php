<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\NoteService;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Session;
use App\Exceptions\NoteNotStoredException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
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
        if ($request->has('check_code') && strlen($request->get('check_code')) != 0) {
            throw new AccessDeniedHttpException();
        }

        try {
            $note = $this->noteService->store($request->all());
        } catch(NoteNotStoredException $ex) {
            return redirect('/')->with('message', [
                'type' => 'error',
                'text' => $ex->getMessage()
            ]);
        }

        $url = URL::to('/view/' . $note->t_code);

        if ($request->has('is_tutorial') && $request->get('is_tutorial') == 1) {
            Session::put('tutorial_succeed', true);
        }

        return redirect(route('index'))
        ->with('message', [
            'type' => 'success',
            'text' => __('messages.phrase_to_get') . ": <b>{$note->code}</b><br/> " .  __('messages.link') . ": <a href='{$url}'>{$url}</a>"
        ])->with('show_tutorial2', $request->has('is_tutorial') && $request->get('is_tutorial') == 1);
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

        $url = URL::to('/view/' . $note->t_code);

        return view('notes.view')->with('note', $note)->with('code', $request->get('code'))->with('message', [
            'type' => 'success',
            'text' => __('messages.phrase_to_get') . ": <b>{$note->code}</b><br/> " .  __('messages.link') . ": <a href='{$url}'>{$url}</a>"
        ]);
    }

    public function viewDirectly(string $code, Request $request)
    {
        if ($request->has('password')) {
            $note = $this->noteService->findByCodeAndPassword($code, $request->get('password'));
        } else {
            $note = $this->noteService->findByCodeIgnorePassword($code);
        }

        if ($note == null) {
            return view('notes.view')->with('message', [
                'type' => 'need_pass_directly',
                'text' => __('messages.note_not_found')
            ]);
        }

        if ($note->password_hash == null || ($note->password_hash != null && $request->has('password'))) {
            $url = URL::to('/view/' . $note->t_code);

            return view('notes.view')->with('code', null)->with('note', $note)->with('message', [
                'type' => 'success',
                'text' => __('messages.phrase_to_get') . ": <b>{$note->code}</b><br/> " .  __('messages.link') . ": <a href='{$url}'>{$url}</a>"
            ]);
        } else {
            return view('notes.view')->with('message', [
                'type' => 'need_pass_directly',
                'text' => __('messages.note_not_found')
            ]);
        }
    }

    public function index(Request $request)
    {
        return view('notes.index', [
            'message' => Session::get('message'),
             'code' => Session::get('code'),
             'tutorial1' => !Session::has('tutorial_succeed'),
             'tutorial2' => Session::get('show_tutorial2')
             ]);
    }
}
