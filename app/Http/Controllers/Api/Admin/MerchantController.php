<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Merchant;

class MerchantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return 'index';
        $merchants = Merchant::paginate(10);
        return response()->json($merchants);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return 'store';
        $merchant = new Merchant();
        $merchant->merchant_name = $request->merchant_name;
        $merchant->merchant_number = $request->merchant_number;
        $merchant->merchant_address = $request->merchant_address;
        $merchant->merchant_email = $request->merchant_email;
        $merchant->merchant_mobile = $request->merchant_mobile;
        $merchant->tax_no = $request->tax_no;
        $merchant->bin_no = $request->bin_no;
        $merchant->agreement_copy = $request->agreement_copy;
        $merchant->account_title = $request->account_title;
        $merchant->account_number = $request->account_number;
        $merchant->bank_name = $request->bank_name;
        $merchant->branch_name = $request->branch_name;
        $merchant->routing_no = $request->routing_no;
        $merchant->contact_name = $request->contact_name;
        $merchant->contact_mobile = $request->contact_mobile;
        $merchant->contact_email = $request->contact_email;
        $merchant->status = $request->status;
        $merchant->save();
        return response()->json([
            'status' => true,
            'data' => $merchant,
            'message' => 'Merchant stored Successfully!'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return 'show';
        $merchant = Merchant::where('id', $id)->first();
        if($merchant == null){
            return response()->json([
                'status' => false,
                'message' => 'Not Found!'
            ]);
        }else{
            return response()->json([
                'status' => true,
                'data' => $merchant,
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // return 'update';
        $merchant = Merchant::where('id', $id)->first();
        if($merchant == null){
            return response()->json([
                'status' => false,
                'message' => 'Not Found!'
            ]);
        }else{
            $merchant->merchant_name = $request->merchant_name;
            $merchant->merchant_number = $request->merchant_number;
            $merchant->merchant_address = $request->merchant_address;
            $merchant->merchant_email = $request->merchant_email;
            $merchant->merchant_mobile = $request->merchant_mobile;
            $merchant->tax_no = $request->tax_no;
            $merchant->bin_no = $request->bin_no;
            $merchant->agreement_copy = $request->agreement_copy;
            $merchant->account_title = $request->account_title;
            $merchant->account_number = $request->account_number;
            $merchant->bank_name = $request->bank_name;
            $merchant->branch_name = $request->branch_name;
            $merchant->routing_no = $request->routing_no;
            $merchant->contact_name = $request->contact_name;
            $merchant->contact_mobile = $request->contact_mobile;
            $merchant->contact_email = $request->contact_email;
            $merchant->status = $request->status;
            $merchant->update();
            return response()->json([
                'status' => true,
                'data' => $merchant,
                'message' => 'Updated Successfully!'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // return 'destroy';
        $merchant = Merchant::where('id', $id)->first();
        if($merchant == null){
            return response()->json([
                'status' => false,
                'message' => 'Not Found!'
            ]);
        }else{
            $merchant = Merchant::where('id', $id)->delete();
            return response()->json([
                'status' => true,
                'message' => 'Denied Successfully!'
            ]);
        }
    }

    public function merchantSearch(Request $request) 
    {
        // return $request;
        // $reservedSymbols = ['-', '+', '<', '>', '@', '(', ')', '~', '&', '?', '='];
        // $searchTerm = str_replace($reservedSymbols, ' ', $request->merchant_name);

        // $searchValues = preg_split('/\s+/', $searchTerm, -1, PREG_SPLIT_NO_EMPTY);

        // $merchantSearch = Merchant::where(function ($q) use ($searchValues) {
        //     foreach ($searchValues as $value) {
        //         $q->Where('merchant_name', 'like', "%{$value}%");
        //         $q->orWhere('merchant_number', 'like', "%{$value}%");
        //         $q->orWhere('merchant_email', 'like', "%{$value}%");
        //         $q->andWhere('merchant_mobile', 'like', "%{$value}%");
        //     }
        // })->paginate(30);
        $merchantSearch = Merchant::where('merchant_name', 'like', "%{$request->merchant_name}%")
        ->where('merchant_number', 'like', "%{$request->merchant_number}%")
        ->where('merchant_email', 'like', "%{$request->merchant_email}%")
        ->where('merchant_mobile', 'like', "%{$request->merchant_mobile}%")
        ->paginate(30);
        return response()->json(
            $merchantSearch
        );
    }
}
