<?php

namespace App\Http\Controllers\Backend\Currency;

# Facades
use Illuminate\Http\Request;
# Controllers
use App\Http\Controllers\Controller;

class CurrencyController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function convert(Request $request)
    {
        $from = $request->from;
        $to = $request->to;

        $url = file_get_contents('https://free.currencyconverterapi.com/api/v5/convert?q=' . $from . '_' . $to . '&compact=ultra');
        $json = json_decode($url, true);
        $rate = implode(" ", $json);
        return json_encode($rate);
    }
}
