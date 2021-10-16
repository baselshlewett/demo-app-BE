<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Api\Countries;

class CountriesController extends Controller
{
    // we use dependency injection to initialize countries model class
    public function get(Countries $countriesModel)
    {
        // for demo purposes, we can return all users, but in production it should be paginated
        $countries = $countriesModel->select('cnt_id', 'cnt_title')->get();
        return response()->json($countries);
    }
}
