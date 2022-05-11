<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $users = User::query();
            return Datatables::of($users)
                    ->addIndexColumn()
                    ->addColumn('username', function ($row) {
                        return $row->name." ".$row->lastname;
                    })
                    ->addColumn('created', function ($row) {
                        return date('M d Y',strtotime($row->created_at));
                    })
                    ->addColumn('status', function ($row) {
                        if($row->status == 0){
                            return '<div class="label-main"><label class="label label-lg bg-default">Not verified</label></div>';
                        } else {
                            return '<div class="label-main"><label class="label label-lg bg-success">Verified</label></div>';
                        }
                    })
                    ->addColumn('action', function($row){
                            return '<a href="'.route("user.details",$row->id).'" class="btn btn-info waves-effect" data-toggle="tooltip" data-placement="top" title="View Details"><i class="ti-eye"></i></a>';
                    })
                    ->rawColumns(['action','status'])
                    ->make(true);
        }

        return view('admin.users.users');
    }

    public function getUser($id)
    {
        $user = User::find($id);
        $campaigns = DB::table('stories')
                        ->leftJoin('donations', 'stories.id','donations.campaign_id')
                        ->select('stories.id','stories.title','stories.fundgoals','stories.deadline','stories.status','stories.description',DB::raw('SUM(donations.amount) as amount')) 
                        ->where('stories.owner_id', $id)
                        ->orderBy('stories.id', 'DESC')
                        ->groupBy('stories.id','stories.title','stories.fundgoals','stories.deadline','stories.status','stories.description')
                        ->get();
                        
        $transactions = DB::table('transactions')
                            ->join('users', 'transactions.user_id', 'users.id')
                            ->leftJoin('stories', 'transactions.campaign', 'stories.id')
                            ->select('transactions.*', 'users.name', 'users.lastname', 'stories.title', 'stories.id as camp_id')
                            ->where('transactions.user_id', $id)
                            ->get();

        return view('admin.users.user_details', compact('user','campaigns','transactions'));
    }
}
