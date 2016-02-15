<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCustomerRequest;
use Exception;
use Illuminate\Http\JsonResponse;

class CustomersController extends Controller {

    public function index() {

        $data = array(
            'customers' => Customer::all()
        );

        return view('customers/index', $data);
    }

    public function store(CreateCustomerRequest $request) {

        $customer = $this->_requestToCustomer($request, 0);

        try {
            $customer->save();
            return new JsonResponse($customer);
        } catch (Exception $e) {

            $response = array(
                'errors'  => $e,
                'message' => $e->getMessage()
            );

            return new JsonResponse($response, 500);
        }
    }

    private function _requestToCustomer(CreateCustomerRequest $request, $customerId) {

        if ($customerId > 0) {
            $customer = Customer::find($customerId);
        } else {
            $customer = new Customer();
        }

        $customer->name           = $request->name;
        $customer->device_id      = $request->device_id;
        $customer->contact_number = $request->contact_number;
        $customer->location       = $request->location;
        $customer->gender         = $request->gender;
        $customer->birth_date     = $request->birth_date;

        return $customer;
    }

}
