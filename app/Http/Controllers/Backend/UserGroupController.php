<?php

namespace App\Http\Controllers\Backend;

use Yajra\Datatables\Datatables;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Backend\UserGroup;

class UserGroupController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request){
       if($request->ajax()){
            $modelUserGroup = new UserGroup();
            $modelUserGroup->name = $request->name;

            $modelUserGroup->save();

            return response()->json(['success' => 'Congratulation! A group is successfully created']);
       }
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getData(Request $request)
    {
        if ($request->ajax()) {
            $userGroup = UserGroup::query();
            
            return Datatables::of($userGroup)  
                ->addColumn('action', function($model){
                    return '<a href="#" class="btn btn-xs btn-primary btn-edit" id="'.$model->id.'"><i class="icon_pencil-edit"></i></a>' . ' ' .
                            '<a href="#" class="btn btn-xs btn-danger" id="'.$model->id.'"><i class="icon_trash_alt"></i></a>' . ' ' . 
                            '<a href="#" class="btn btn-xs btn-default" id="'.$model->id.'"><i class="fa fa-eye"></i></a>';
                })
                ->make(true);
        }
    }
}
