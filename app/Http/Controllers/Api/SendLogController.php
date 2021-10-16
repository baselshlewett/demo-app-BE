<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Api\SendLog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Arr;

class SendLogController extends Controller
{
    // we use dependency injection to initialize SendLog model class
    public function get(Request $request, SendLog $sendLog)
    {
        $validator = Validator::make(request()->all(), [
            'date_from' => 'required|date|before_or_equal:date_to',
            'date_to' => 'required|date|after_or_equal:date_from',
            'country_id' => 'integer',
            'user_id' => 'integer'
        ]);

        // return array of errors to client with status code 400
        if ($validator->fails())
            return response()->json(Arr::flatten($validator->errors()->toArray()), 400);

        // we set default dates to return data at first open or in case date range filter hasn't been sent from FE
        $dateFrom = Carbon::now()->subDays(7);
        $dateTo = Carbon::now();

        $countryId = 0;
        $userId = 0;

        // do we have date filter set?
        if ($request->has('date_from', 'date_to')) {
            $dateFrom = Carbon::parse($request->get('date_from'));
            $dateTo = Carbon::parse($request->get('date_to'));
        }

        if ($request->has('country_id')) {
            $countryId = $request->get('country_id');
        }

        if ($request->has('user_id')) {
            $userId = $request->get('user_id');
        }

        return response()->json($sendLog->getAll($dateFrom, $dateTo, $countryId, $userId));
    }
}
