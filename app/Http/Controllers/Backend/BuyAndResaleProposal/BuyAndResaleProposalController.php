<?php

namespace App\Http\Controllers\Backend\BuyAndResaleProposal;

# Facades
use Illuminate\Http\Request;
use Session;
use Auth;
# Controller
use App\Http\Controllers\Controller;
# Models
use App\Models\Customer\Customer;
use App\Models\Project\Project;
use App\Models\Aftermarket\Aftermarket;
use App\Models\Seal\Seal;
use App\Models\BuyAndResaleProposal\BuyAndResaleProposal;
use App\Models\BuyAndResaleProposal\BuyAndResaleProposalItem;
# Requests
use App\Http\Requests\Backend\BuyAndResaleProposal\ManageBuyAndResaleProposalRequest;
use App\Http\Requests\Backend\BuyAndResaleProposal\StoreBuyAndResaleProposalRequest;
use App\Http\Requests\Backend\BuyAndResaleProposal\CreateBuyAndResaleProposalRequest;
use App\Http\Requests\Backend\BuyAndResaleProposal\EditBuyAndResaleProposalRequest;
use App\Http\Requests\Backend\BuyAndResaleProposal\UpdateBuyAndResaleProposalRequest;
use App\Http\Requests\Backend\BuyAndResaleProposal\DeleteBuyAndResaleProposalRequest;
# Repositories
use App\Repositories\Backend\BuyAndResaleProposal\BuyAndResaleProposalRepository;

class BuyAndResaleProposalController extends Controller
{
    protected $buyAndResaleProposalRepository;

    public function __construct(BuyAndResaleProposalRepository $buyAndResaleProposalRepository)
    {
        $this->buyAndResaleProposalRepository = $buyAndResaleProposalRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ManageBuyAndResaleProposalRequest $request)
    {
        return view('backend.buy_and_resale_proposal.index')
        ->with('buy_and_resale_proposals', $this->buyAndResaleProposalRepository->getPaginatedBuyAndResaleProposal());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ordered_products = [];
        
        if (session()->has('products')) {
            $products = session()->get('products');
            $ordered_products = [];

            foreach($products as $key => $product) {
                $product = explode('-', $product);
                // Set Model
                $model = 'App\Models\\'.$product[1].'\\'.$product[1];
                // Set ID
                $id = $product[0];

                $ordered_products[] = $model::find($id);
            }

            if (Auth::user()->roles_label == "Sales Agent") {
                $customers = Customer::where('user_id', Auth::user()->id)->get();
            } else if (Auth::user()->roles_label == "Administrator") {
                $customers = Customer::all();
            }

            return view('backend.buy_and_resale_proposal.create')->withCustomers($customers)->with('ordered_products', $ordered_products);
        }

        if (Auth::user()->roles_label == "Sales Agent") {
            $customers = Customer::where('user_id', Auth::user()->id)->get();
        } else if (Auth::user()->roles_label == "Administrator") {
            $customers = Customer::all();
        }

        return view('backend.buy_and_resale_proposal.create')->withCustomers($customers)->with('ordered_products', $ordered_products);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->buyAndResaleProposalRepository->create($request->except('_token'));

        return redirect()->back()->withFlashSuccess(__('alerts.backend.indented_proposals.created', ['indented_proposal' => $request->wpc_reference]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(BuyAndResaleProposal $buyAndResaleProposal, ManageBuyAndResaleProposalRequest $request)
    {
        return view('backend.buy_and_resale_proposal.show')->withModel($buyAndResaleProposal);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function changeItemDeliveryStatus(BuyAndResaleProposalItem $item, Request $request)
    {
        $this->buyAndResaleProposalRepository->changeItemDeliveryStatus($item, $request->only('delivery_status'));

        return redirect()->back();
    }
}
