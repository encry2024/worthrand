<?php

namespace App\Http\Controllers\Backend\IndentedProposal;

# Facades
use Illuminate\Http\Request;
use Auth;
# Controllers
use App\Http\Controllers\Controller;
# Repositories
use App\Repositories\Backend\IndentedProposal\IndentedProposalRepository;
# Models
use App\Models\IndentedProposal\IndentedProposal;
# Requests
use App\Http\Requests\Backend\IndentedProposal\AcceptIndentedProposalRequest;


class IndentedProposalStatusController extends Controller
{
    protected $indentedProposalRepository;

    public function __construct(IndentedProposalRepository $indentedProposalRepository)
    {
        $this->indentedProposalRepository = $indentedProposalRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function acceptProposal(IndentedProposal $indentedProposal, AcceptIndentedProposalRequest $request)
    {
        $this->indentedProposalRepository->accept($indentedProposal);

        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
