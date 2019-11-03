<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\NoteService;

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
        return $this->noteService->store($request->all());
     }

    public function view(string $code, Request $request)
    {
        if ($request->has('password')) {
            return $this->noteService->findByCodeAndPassword($code, $request->get('password'));
        } else {
            return $this->noteService->findByCode($code);
        }
    }

    public function index(Request $request)
    {

    }
}
