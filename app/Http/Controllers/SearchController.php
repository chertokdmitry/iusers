<?php


namespace App\Http\Controllers;

use App\Services\UsersService;
use App\Services\ValidationService;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    const RULES= [
        'date_start' => 'required|date',
        'date_end' => 'required|date|after_or_equal:date_start'
    ];

    private $usersService;
    private $validationService;

    public function __construct(UsersService $usersService, ValidationService $validationService)
    {
        $this->validationService = $validationService;
        $this->usersService = $usersService;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getSearch(Request $request)
    {
        $result = $this->usersService->search($request);

        return view('index', ['items' => $result['users'], 'roles' => $result['roles'], 'links' => true]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getSearchDate(Request $request)
    {
        if ($this->validationService->validate($request, self::RULES)) {
            $result = $this->usersService->searchDate($request);

            return view('index', ['items' => $result['users'], 'roles' => $result['roles'], 'links' => true]);
        }
    }
}
