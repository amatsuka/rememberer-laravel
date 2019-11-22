<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\NoteService;
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

        return redirect(route('index'))
        ->with('message', [
            'type' => 'success',
            'text' => "Заметка сохранена. Код для получения: {$note->code}. Ссылка: http://127.0.0.1:8000/view/{$note->t_code}"
            ]);
     }

    public function view(Request $request)
    {
        if ($request->has('password') && $request->get('password') != null) {
            $note = $this->noteService->findByCodeAndPassword($request->get('code'), $request->get('password'));
        } elseif ($request->has('code')) {
            $note = $this->noteService->findByCode($request->get('code'));
        }

        if ($note == null) {
            return view('notes.view')->with('message', [
                'type' => 'warning',
                'text' => 'Запись не найдена. Введен неверный код либо запись защищена паролем'
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
            return view('notes.view', compact('note'));
        } else {
            return redirect('note.view.get')->with('code', $code);
        }
    }

    public function index(Request $request)
    {
        return view('notes.index', ['message' => Session::get('message')]);
    }
}
