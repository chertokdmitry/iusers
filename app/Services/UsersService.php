<?php


namespace App\Services;

use Illuminate\Http\Request;
use App\Services\Repositories\UsersRepository;

class UsersService
{
    private $usersRepository;

    public function __construct(UsersRepository $usersRepository)
    {
        $this->usersRepository = $usersRepository;
    }

    /**
     * @param $roles
     * @return array
     */
    private function getRoles($roles)
    {
        $userRoles = [];

            foreach ($roles as $role) {
                $userRoles[] = $role->id;
            }

        return $userRoles;
    }

    /**
     * @return array
     */
    public function index()
    {
        $users = $this->usersRepository->index();

        $userRoles = (!empty($users->roles)) ? $this->getRoles($users->roles) : [];

        return ['users' => $users, 'roles' => $userRoles];
    }

    /**
     * @param $request
     * @return array
     */
    public function search($request)
    {
        $users = $this->usersRepository->search($request);

        $userRoles = (!empty($users->roles)) ? $this->getRoles($users->roles) : [];

        return ['users' => $users, 'roles' => $userRoles];
    }

    /**
     * @param $request
     * @return array
     */
    public function searchDate($request)
    {
        $users = $this->usersRepository->searchDate($request);

        $userRoles = (!empty($users->roles)) ? $this->getRoles($users->roles) : [];

        return ['users' => $users, 'roles' => $userRoles];
    }

    /**
     * @param Request $request
     */
    public function store(Request $request)
    {
        $this->usersRepository->store($request);
    }

    /**
     * @param $id
     */
    public function edit($id)
    {
        $this->usersRepository->edit($id);
    }

    /**
     * @param Request $request
     * @param $model
     */
    public function update(Request $request, $model)
    {
        $this->usersRepository->update($request, $model);
    }

    /**
     * @param $model
     */
    public function destroy($model)
    {
        $this->usersRepository->destroy($model);
    }
}
