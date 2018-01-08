<?php

namespace App\Http\Controllers;

use App\DebtData;
use http\Env\Response;
use Illuminate\Http\Request;

class WebController extends Controller {
    public function home(Request $request) {
        $data = DebtData::all();

        if($request->input('format') == 'json'){
            return response()
                ->json($data->toArray());
        } else {
            return response(view('welcome'));
        }
    }

}
