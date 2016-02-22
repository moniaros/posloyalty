<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Sales;
use App\SalesProduct;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Maatwebsite\Excel\Facades\Excel;

class SalesController extends Controller {

    public function index() {

        $data = array(
            'salesList' => Sales::all()
        );

        return view('sales/index', $data);
    }

    public function upload(Request $request) {

        $statusCode = 200;
        $response   = [];

        if ($request->sales) {
            try {
                DB::beginTransaction();
                $this->_saveSales($request->sales);
                $this->_saveSalesRewards($request->sales_rewards);
                $this->_saveSalesProducts($request->sales_products);
                DB::commit();

                $response = [
                    'status' => 'SUCCESS',
                    'error'  => null
                ];
            } catch (Exception $e) {
                DB::rollBack();
                $statusCode = 500;
                $response   = [
                    'status' => 'ERROR',
                    'error'  => $e->getMessage()
                ];
            }
        } else {
            $statusCode = 400;
            $response   = [
                'status' => 'ERROR',
                'error'  => 'Sales required'
            ];
        }

        return Response::json($response, $statusCode);
    }

    public function export() {

        $now      = date('ymd_His');
        $fileName = "Transactions_{$now}";

//        $extension = "xls";
//        $location  = storage_path('excel/exports');

        return Excel::create($fileName, function($excel) use($now) {
                    $excel->sheet("Transactions_{$now}", function($sheet) {

                        $sheet->appendRow([
                            'Transaction', 'Transaction Date', 'Store', 'Total Sale Amount', 'Total Discounted Amount',
                            'Customer', 'Contact', 'Location', 'Gender'
                        ]);

                        $sheet->row($sheet->getHighestRow(), function ($row) {
                            $row->setFontWeight('bold');
                        });

                        $this->_populateSheet($sheet);
                    });
//        })->store($extension, $location);
                })->download('xlsx');

//        return $location . "/" . $fileName . "." . $extension;
    }

    private function _populateSheet(&$sheet) {

        $salesTransactions = Sales::all();

        foreach ($salesTransactions AS $sales) {
            $row = [
                (string) $sales->transaction_number,
                $sales->transaction_date,
                $sales->store->name,
                $sales->amount,
                $sales->total_discount
            ];

            $customer = $sales->customer;
            if ($customer) {
                array_push($row, $customer->name);
                array_push($row, $customer->contact_number);
                array_push($row, $customer->location);
                array_push($row, $customer->gender);
            }

            $sheet->appendRow($row);
        }
    }

    private function _saveSales(array $sales) {

        foreach ($sales AS $salesTransaction) {

            $sales                     = new Sales();
            $sales->transaction_number = $salesTransaction["transaction_number"];
            $sales->store_id           = $salesTransaction["store_id"];
            $sales->amount             = $salesTransaction["amount"];
            $sales->transaction_date   = $salesTransaction["transaction_date"];
//            $sales->transaction_date = $salesTransaction["transacion_date"];

            if (array_key_exists("customer_id", $salesTransaction)) {
                $sales->customer_id = $salesTransaction["customer_id"];
            }

            if (array_key_exists("total_discount", $salesTransaction)) {
                $sales->total_discount = $salesTransaction["total_discount"];
            } else {
                $sales->total_discount = 0;
            }

            $sales->save();
        }
    }

    private function _saveSalesRewards(array $salesRewards) {
        foreach ($salesRewards AS $reward) {
            DB::table('sales_has_rewards')->insert($reward);
        }
    }

    private function _saveSalesProducts(array $salesProducts) {
        foreach ($salesProducts AS $product) {

            $salesProduct                           = new SalesProduct();
            $salesProduct->sales_transaction_number = $product["sales_transaction_number"];
            $salesProduct->product_id               = $product["product_id"];
            $salesProduct->quantity                 = $product["quantity"];
            $salesProduct->sub_total                = $product["sub_total"];
            $salesProduct->sale_type                = $product["sale_type"];

//            try {
            $salesProduct->save();
//            } catch (Exception $e) {
//                echo $salesProduct->product_id + " - " + $e->getMessage();
//            }
        }
    }

}
