<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\NoteService;
use Illuminate\Support\Facades\Session;
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
        $note = $this->noteService->store($request->all());

        return redirect(route('index'))->with(compact('note'));
     }

    public function view(Request $request)
    {
        if ($request->has('password') && $request->get('password') != null) {
            $note = $this->noteService->findByCodeAndPassword($request->get('code'), $request->get('password'));
        } elseif ($request->has('code')) {
            $note = $this->noteService->findByCode($request->get('code'));
        }

        if ($note == null) {
            throw new NotFoundHttpException();
        }

        return view('notes.view', compact('note'))->with('code', $request->get('code'));
    }

    public function viewDirectly(string $code)
    {
        $note = $this->noteService->findByCodeIgnorePassword($code);

        if ($note == null) {
            throw new NotFoundHttpException();
        }

        if ($note->password_hash == null) {
            return view('notes.view', compact('note'));
        } else {
            return view('notes.view')->with('code', $code)->with('warning', 'Необходимо ввести пароль');
        }
    }

    public function index(Request $request)
    {
        return view('notes.index', ['note' => Session::get('note')]);
    }
}
