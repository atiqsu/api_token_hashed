<?php

namespace App\Http\Controllers\Api;

use App\AppConfig;
use App\Http\Controllers\Controller;
use App\Model\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class GroupController extends Controller {


    /**
     *
     * @author Md. Atiqur Rahman <atiqur.su@gmail.com, atiqur@shaficonsultancy.com>
     * @param Request $request
     * @return array|\Illuminate\Support\MessageBag
     */
    public function __create(Request $request){

        $rules = array(
            'name'  => 'required',
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {

            return $validator->errors();
        }

        $post   = Group::create($request->all());


        return array(
            'msg'    => 'Successful',
            'dt'    => $post,
            'result' => AppConfig::GENERAL_RETURN_RESULT_OK,
        );
    }
}
