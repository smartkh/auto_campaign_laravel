<?php

namespace App\Http\Controllers\Backend;

use Yajra\Datatables\Datatables;

use App\User;
use Illuminate\Http\Request;
use Redirect;

use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Displays datatables front end view
     *
     * @return \Illuminate\View\View
     */
    public function getIndex()
    {
        return view('backend.partials.user');
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getData()
    {
        return Datatables::of(User::query())
        ->addColumn('select', function($model){
            return '<input type="checkbox" name="user[]" class="user checkBoxClass" value="' . $model->id .  '" />';
        })
        ->addColumn('action', function($model){
            return '<a href="javascript:void(0)" data-toggle="tooltip" class="btn btn-xs btn-primary btn-edit" id="'.$model->id.'"><i class="icon_pencil-edit"></i></a>' . ' ' .
                    '<a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $model->id . '" class="btn btn-xs btn-danger btn_delete" id="'.$model->id.'"><i class="icon_trash_alt btn_delete"></i></a>' . ' ' . 
                    '<a href="javascript:void(0)" data-toggle="tooltip" class="btn btn-xs btn-default" id="'.$model->id.'"><i class="fa fa-eye"></i></a>';
        })
        ->rawColumns(['select', 'action'])
        ->make(true);
    }

    // update single user by user id
    public function update(Request $request){
        $update_id = $request->input('id');
        $user = User::find($update_id);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();
    }

    // delete single user
    public function delete($id){
        User::destroy($id);
        return response()->json(['success'=>"Products Deleted successfully."]);
    }

    // delete multi selected user
    public function destroyMany(Request $request)
    {
        $delete_ids = $request->input('id');
        $users = User::whereIn('id', $delete_ids); 
        $users->delete();
    }
}
