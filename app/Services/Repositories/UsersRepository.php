<?php


namespace App\Services\Repositories;

use App\Models\UserRole;
use App\Models\User;
use \Illuminate\Http\Request;


/**
 * Class UsersRepository
 * @package App\Services\Repositories
 */

class UsersRepository implements RepositoryInterface
{
    /**
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function index()
    {
        return User::with(['type', 'roles'])->paginate(5);
    }

    /**
     * @param Request $request
     */
    public function store(Request $request)
    {
        $model = new User;
        $model->fio = $request->fio;
        $model->type_id = $request->type_id;
        $model->birth = $request->birth;
        $model->organization = $request->organization;
        $model->save();

        if (!empty($request->role_id)) {
            foreach ($request->role_id as $newRole) {
                $role = new UserRole;
                $role->user_id = $model->id;
                $role->role_id = $newRole;
                $role->save();
            }
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function search(Request $request)
    {
        $data = $request->all();

        return User::query()
            ->where('fio', 'LIKE', "%{$data['query']}%")
            ->paginate(5);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function searchDate(Request $request)
    {
        $data = $request->all();

        return User::query()
            ->where('created_at', '>=', $data['date_start'])
            ->where('created_at', '<=', $data['date_end'])
            ->paginate(5);
    }

    /**
     * @param Request $request
     * @param $model
     */
    public function update(Request $request, $model)
    {
        $model->fio = $request->fio;
        $model->type_id = $request->type_id;
        $model->birth =  $request->birth;
        $model->organization =  $request->organization;
        $model->save();
    }

    /**
     * @param $model
     */
    public function destroy($model)
    {
        $model->delete();
    }
}
