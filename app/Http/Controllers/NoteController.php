<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\NoteService;
use Illuminate\Support\Facades\Session;

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
        $note = $this->noteService->store($request->all());

        return redirect(route('index'))->with(compact('note'));
     }

    public function view(string $code, Request $request)
    {
        if ($request->has('password')) {
            $note = $this->noteService->findByCodeAndPassword($code, $request->get('password'));
        } else {
            $note = $this->noteService->findByCode($code);
        }

        return view('notes.show', compact('note'));
    }

    public function index(Request $request)
    {
        return view('notes.index', ['note' => Session::get('note')]);
    }
}
