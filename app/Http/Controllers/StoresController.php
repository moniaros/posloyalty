<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Store;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class StoresController extends Controller {

    public function index() {

        $data = array(
            'stores' => Store::all()
        );

        return view('stores/index', $data);
    }
    
    public function withoutDevice() {
        return Store::where('device_id', null)->get();
    }

    public function create() {
        return view('stores/create');
    }

    public function edit($id) {

        $data = array(
            'store' => Store::find($id)
        );

        return view('stores/edit', $data);
    }

    public function delete($id) {

        $store = Store::find($id);
        $store->delete();
        return redirect()->back();
    }

    public function store(Request $request) {
        //  TODO: move this to a request object
        $v = Validator::make($request->all(), [
                    'name' => 'required'
        ]);

        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors());
        }

        $store       = new Store();
        $store->name = $request->name;

        try {
            $store->save();
            return redirect()->back()->withMessage("Saved");
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function update(Request $request, $id) {
        //  TODO: move this to a request object
        $v = Validator::make($request->all(), [
                    'name' => 'required'
        ]);

        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors());
        }

        $store       = Store::find($id);
        $store->name = $request->name;

        try {
            $store->save();
            return redirect()->back()->withMessage("Saved");
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function registerDevice(Request $request, $id) {

        //  TODO: move this to a request object
        $v = Validator::make($request->all(), [
                    'device_id' => 'required'
        ]);

        if ($v->fails()) {
            return Response::json([
                        'errors' => $v->errors()
                            ], 400);
        }

        $store            = Store::find($id);
        $store->device_id = $request->device_id;

        try {
            $store->save();
            return Response::json([
                        'device_web_id' => $store->id,
                        'message'       => 'Saved'
                            ], 200);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

}
