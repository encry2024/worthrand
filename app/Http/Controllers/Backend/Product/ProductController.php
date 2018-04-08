<?php

namespace App\Http\Controllers\Backend\Product;

# Facades
use Illuminate\Http\Request;
use Session;
use File;
# Controller
use App\Http\Controllers\Controller;
# Models
use App\Models\Project\Project;
use App\Models\Aftermarket\Aftermarket;
use App\Models\Seal\Seal;

class ProductController extends Controller
{
    //
    public function index(Request $request)
    {
        $previous = Session::all();

        $request->session()->put('parent_page', $previous);

        $parent_page = $request->session()->get('parent_page._previous.url');

        return view('backend.product.index')->with('parent_page', $parent_page);
    }

    public function addProduct(Request $request)
    {
        $request->session()->put('products', $request->requests);
        
        return json_encode($request->redirect_to);
    }

    public function get(Request $request)
    {
        $product_category = $request->category_id;
        $files = [];

        if ($product_category == 1) {
            $projects = Project::all();

            $projects->each(function($project) {
                $project->load('latest_pricing_histories');
            });

            return json_encode($projects);
        } elseif ($product_category == 2) {
            $aftermarkets = Aftermarket::get(['id', 'name', 'ccn_number', 'model', 'part_number', 'reference_number', 'serial_number', 'sap_number', 'tag_number']);

            $aftermarkets->each(function($aftermarket) {
                $aftermarket->load('latest_pricing_histories');
            });

            return json_encode($aftermarkets);
        } else {
            $seals = Seal::get(['id', 'name', 'drawing_number', 'bom_number', 'end_user', 'seal_type', 'size', 'code', 'model']);

            $seals->each(function($seal) {
                $seal->load('latest_pricing_histories');
            });

            return json_encode($seals);
        }
    }
}
