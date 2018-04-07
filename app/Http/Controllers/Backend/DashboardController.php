<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Customer\Customer;
use App\Models\IndentedProposal\IndentedProposal;
use App\Models\IndentedProposal\IndentedProposalItem;
use DB;
use Auth;

/**
 * Class DashboardController.
 */
class DashboardController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        if (Auth::user()->roles_label == 'Sales Agent') {
            # Indented Proposal
            $indented_proposal_queries = DB::table('indented_proposals')
            ->leftJoin('customers', 'customers.id', '=', 'indented_proposals.customer_id')
            ->leftJoin(
                DB::raw(
                    '(
                        SELECT indented_proposal_items.indented_proposal_id, SUM(indented_proposal_items.price) 
                        AS profit, indented_proposal_items.quantity AS quantity 
                        FROM indented_proposal_items 
                        GROUP BY indented_proposal_items.indented_proposal_id
                    ) AS indented_proposal_items'
                ), 'indented_proposals.id', '=', 'indented_proposal_items.indented_proposal_id'
            )
            ->select('customers.*', DB::raw('(profit * quantity) AS total_profit'), 'indented_proposals.user_id')
            ->where('indented_proposals.collection_status', '=', 'COMPLETED')
            ->where('indented_proposals.user_id', '=', Auth::user()->id)
            ->get();
            // dd($indented_proposal_queries);

            # Buy and Resale Proposal
            $buy_and_resale_proposal_queries = DB::table('buy_and_resale_proposals')
            ->leftJoin('customers', 'customers.id', '=', 'buy_and_resale_proposals.customer_id')
            ->leftJoin(
                DB::raw(
                    '(
                        SELECT buy_and_resale_proposal_items.buy_and_resale_proposal_id, SUM(buy_and_resale_proposal_items.price) 
                        AS profit , buy_and_resale_proposal_items.quantity AS quantity 
                        FROM buy_and_resale_proposal_items 
                        GROUP BY buy_and_resale_proposal_items.buy_and_resale_proposal_id
                    ) AS buy_and_resale_proposal_items'
                ), 'buy_and_resale_proposals.id', '=', 'buy_and_resale_proposal_items.buy_and_resale_proposal_id'
            )
            ->select('customers.*', DB::raw('(profit * quantity) as total_profit'), 'buy_and_resale_proposals.user_id')
            ->where('buy_and_resale_proposals.user_id', '=', Auth::user()->id)
            ->where('buy_and_resale_proposals.collection_status', '=', 'COMPLETED')->get();

            return view('backend.dashboard')
                ->with('indented_proposal_reports', json_encode($indented_proposal_queries))
                ->with('buy_and_resale_proposal_reports', json_encode($buy_and_resale_proposal_queries));
        } elseif (Auth::user()->roles_label == 'Administrator') {
             # Indented Proposal
            $indented_proposal_queries = DB::table('indented_proposals')
            ->leftJoin('customers', 'customers.id', '=', 'indented_proposals.customer_id')
            ->leftJoin(
                DB::raw(
                    '(
                        SELECT indented_proposal_items.indented_proposal_id, SUM(indented_proposal_items.price) 
                        AS profit, indented_proposal_items.quantity AS quantity 
                        FROM indented_proposal_items 
                        GROUP BY indented_proposal_items.indented_proposal_id
                    ) AS indented_proposal_items'
                ), 'indented_proposals.id', '=', 'indented_proposal_items.indented_proposal_id'
            )
            ->select('customers.*', DB::raw('(profit * quantity) AS total_profit'))
            ->where('indented_proposals.collection_status', '=', 'COMPLETED')
            ->get();

            # Buy and Resale Proposal
            $buy_and_resale_proposal_queries = DB::table('buy_and_resale_proposals')
            ->leftJoin('customers', 'customers.id', '=', 'buy_and_resale_proposals.customer_id')
            ->leftJoin(
                DB::raw(
                    '(
                        SELECT buy_and_resale_proposal_items.buy_and_resale_proposal_id, SUM(buy_and_resale_proposal_items.price) 
                        AS profit , buy_and_resale_proposal_items.quantity AS quantity 
                        FROM buy_and_resale_proposal_items 
                        GROUP BY buy_and_resale_proposal_items.buy_and_resale_proposal_id
                    ) AS buy_and_resale_proposal_items'
                ), 'buy_and_resale_proposals.id', '=', 'buy_and_resale_proposal_items.buy_and_resale_proposal_id'
            )
            ->select('customers.*', DB::raw('(profit * quantity) as total_profit'))
            ->where('buy_and_resale_proposals.collection_status', '=', 'COMPLETED')->get();

            return view('backend.dashboard')
                ->with('indented_proposal_reports', json_encode($indented_proposal_queries))
                ->with('buy_and_resale_proposal_reports', json_encode($buy_and_resale_proposal_queries));
        } else {
            return view('backend.dashboard');
        }
    }
}
