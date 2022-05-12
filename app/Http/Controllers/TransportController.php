<?php

namespace App\Http\Controllers;

use App\Helpers\Calculations as HelpersCalculations;
use App\Http\Controllers\Calculations as ControllersCalculations;
use Illuminate\Http\Request;
use Calculations;
use Illuminate\Support\Facades\Validator;

class TransportController extends Controller
{
    //
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function calculate(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'transport' => 'required|array',
            'containers' => 'required|array',
        ]);
 
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Check your input and try again'
            ], 401);
        }

        try {
            $calculationHelper = new HelpersCalculations();
            // return response()->json([
            //     'success' => false,
            //     'data' => $calculationHelper->getTransports($request->transport) 
            // ], 200);
            return response()->json([
                'success' => true,
                'data' => $calculationHelper->calculate(
                    $calculationHelper->getContainers($request->containers), 
                    $calculationHelper->getTransports($request->transport) 
                    )
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th->getMessage()
            ], 200);
        }
        

       
    }
}
