<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\UsersService;
use App\Services\ValidationService;
use Illuminate\Http\Request;
use App\Models\Type;

class UsersController extends Controller
{
    const RULES = [
        'fio' => 'required|max:255',
        'organization' => 'required',
        'type_id' => 'required',
        'role_id' => 'required',
    ];

    const RULES_UPDATE = [
        'fio' => 'required|max:255',
        'type_id' => 'required'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $usersService;
    private $validationService;

    public function __construct(UsersService $usersService, ValidationService $validationService)
    {
        $this->validationService = $validationService;
        $this->usersService = $usersService;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create', ['types' => Type::all()->pluck('name', 'id')->toArray()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($this->validationService->validate($request, self::RULES)) {
            $this->usersService->store($request);

            return redirect('/');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('edit', ['model' => $user, 'types' => Type::all()->pluck('name', 'id')->toArray()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if ($this->validationService->validate($request, self::RULES_UPDATE)) {
            $this->usersService->update($request, $user);

            return redirect('/');
        }
    }

    /**
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(User $user)
    {
        $this->usersService->destroy($user);

        return redirect('/');
    }
}
