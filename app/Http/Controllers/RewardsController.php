<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Product;
use App\Reward;
use DateTime;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class RewardsController extends Controller {

    public function index() {

        $dataType = Input::get("dataType");

        if ($dataType === "json") {
            $lastUpdate = Input::get('lastUpdate');
            $rewards    = Reward::newData($lastUpdate)->get();

            return $rewards;
        } else {
            $data = array(
                'rewards' => Reward::all()
            );

            return view('rewards.index', $data);
        }
    }

    public function create() {

        $data = array(
            'products' => Product::all()
        );

        return view('rewards.create', $data);
    }

    public function show($id) {

        $reward = Reward::find($id);

        $data = array(
            'reward'   => $reward,
            'products' => Product::all()
        );

        return view('rewards.edit', $data);
    }

    public function edit($id) {

        $reward = Reward::find($id);

        $data = array(
            'reward'   => $reward,
            'products' => Product::all()
        );

        return view('rewards.edit', $data);
    }

    public function store(Request $request) {
        return $this->_saveReward($request, 0);
    }

    public function update(Request $request, $id) {
        return $this->_saveReward($request, $id);
    }

    private function _saveReward(Request $request, $id) {
        
        //  TODO: move this to a request object
        $v = Validator::make($request->all(), [
                    'reward_condition' => 'required',
                    'reward'           => 'required',
                    'reward_value'     => 'required',
                    'reward_type'      => 'required',
                    'valid_from'       => 'required',
                    'valid_until'      => 'required',
        ]);

        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors());
        }

        try {
            $reward = $this->_requestToReward($request, $id);
            $reward->save();
            return redirect()->back()->withMessage("Saved");
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    private function _requestToReward($request, $rewardId) {

        if ($rewardId === 0) {
            $reward = new Reward();
        } else {
            $reward = Reward::find($rewardId);
            if (!$reward) {
                throw new Exception("Reward does not exists");
            }
        }

        $reward->reward_condition = $request->reward_condition;

        if ($reward->reward_condition !== "first_use") {
            $reward->condition_product_id = $request->condition_product_id;
            $reward->condition            = $request->condition;
            $reward->condition_value      = $request->condition_value;
        }

        $reward->reward_type  = $request->reward_type;
        $reward->reward       = $request->reward;
        $reward->reward_value = $request->reward_value;
        $reward->valid_from   = DateTime::createFromFormat('m/d/Y H:i a', $request->valid_from);
        $reward->valid_until  = DateTime::createFromFormat('m/d/Y H:i a', $request->valid_until);

        return $reward;
    }

}
