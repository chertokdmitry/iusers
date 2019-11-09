<?php

namespace App\Http\Controllers;

use App\Services\UsersService;
//use App\Services\ValidationService;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    private $usersService;

    public function __construct(UsersService $usersService)
    {
        $this->usersService = $usersService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = $this->usersService->index();

        return view('index', ['items' => $result['users'], 'roles' => $result['roles'], 'links' => true]);
    }
}
