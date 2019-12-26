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
    public function getData()
    {
        return Datatables::of(UserGroup::query())->make(true);
    }
}
