<?php


namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Type;
use App\Models\UserRole;

class AjaxController extends Controller {

    public function index()
    {
        $id = $_POST['user_type'];
        $type = Type::find($id);
        $checkboxes = view('ajax.header');

        foreach ($type->roles as $role) {
                $checkboxes .= view('ajax.checkbox', ['id' => $role->id, 'name' => $role->name]);
                $uniqueRoles[] = $role->id;
        }

        $checkboxes .= view('ajax.footer');

        return response()->json(array('msg'=> $checkboxes), 200);
    }

    public function addRole()
    {
        $user_id = $_POST['user_id'];
        $role_id = $_POST['role_id'];

        $model = new UserRole;
        $model->user_id = $user_id;
        $model->role_id = $role_id;
        $model->save();

        $msg ='#' . $user_id . '-' . $role_id;

        return response()->json(array('msg'=> $msg), 200);
    }

    public function removeRole()
    {
        $user_id = $_POST['user_id'];
        $role_id = $_POST['role_id'];

        UserRole::where(['user_id' => $user_id, 'role_id' => $role_id])->delete();

        $msg ='#' . $user_id . '-' . $role_id;

        return response()->json(array('msg'=> $msg), 200);
    }
}
