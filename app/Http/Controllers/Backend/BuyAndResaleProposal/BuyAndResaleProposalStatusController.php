<?php

namespace App\Http\Controllers\Backend\BuyAndResaleProposal;

# Facades
use Illuminate\Http\Request;
use Auth;
# Controllers
use App\Http\Controllers\Controller;
# Repositories
use App\Repositories\Backend\BuyAndResaleProposal\BuyAndResaleProposalRepository;
# Models
use App\Models\BuyAndResaleProposal\BuyAndResaleProposal;
# Requests
use App\Http\Requests\Backend\BuyAndResaleProposal\AcceptBuyAndResaleProposalRequest;


class BuyAndResaleProposalStatusController extends Controller
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
    public function acceptProposal(BuyAndResaleProposal $buyAndResaleProposal, AcceptBuyAndResaleProposalRequest $request)
    {
        $this->buyAndResaleProposalRepository->accept($buyAndResaleProposal);

        return redirect()->back();
    }

    /**
     * Change indented proposal status to delivery status
     *
     * @return \Illuminate\Http\Response
     */
    public function sendToAssistant(BuyAndResaleProposal $buyAndResaleProposal, AcceptBuyAndResaleProposalRequest $request)
    {
        $this->buyAndResaleProposalRepository->sendToAssistant($buyAndResaleProposal, $request->except('_token', '_method'));

        return redirect()->back();
    }

    /**
     * Change indented proposal status to FOR-COLLETION status
     *
     * @return \Illuminate\Http\Response
     */
    public function sendToCollector(BuyAndResaleProposal $buyAndResaleProposal, AcceptBuyAndResaleProposalRequest $request)
    {
        // dd($buyAndResaleProposal->indented_proposal_items);

        $this->buyAndResaleProposalRepository->sendToCollector($buyAndResaleProposal, $request->except('_token', '_method'));

        return redirect()->back();
    }

    /**
     * Change indented proposal status to COMPLETED status
     *
     * @return \Illuminate\Http\Response
     */
    public function collect(BuyAndResaleProposal $buyAndResaleProposal, AcceptBuyAndResaleProposalRequest $request)
    {
        // dd($buyAndResaleProposal->indented_proposal_items);

        $this->buyAndResaleProposalRepository->collect($buyAndResaleProposal);

        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
