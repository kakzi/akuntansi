<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Accounting;
use App\Models\Bussiness;
use App\Models\Group;
use App\Models\SubDetails;
use App\Models\SubGroup;
use Illuminate\Support\Facades\Crypt;

class DashboardController extends Controller
{

    public function index(Request $request)
    {

        $bussiness_id = $request->session()->get('bussiness_id');
        $value_id = Crypt::decrypt($bussiness_id);

        $bussiness = Bussiness::where('id', $value_id)->first();
        $neraca = Group::with('subGroups', 'subDetails', 'accountings')->where('bussiness_id', $value_id)->limit(3)->get();
        $labarugi = Group::with('subGroups', 'subDetails', 'accountings')->where('bussiness_id', $value_id)->whereNotIn('code', ['A001', 'B001', 'C001'])->get();
        $sub_groups = SubGroup::where('bussiness_id', $value_id)->get();
        $sub_details = SubDetails::where('bussiness_id', $value_id)->get();
        $accountings = Accounting::where('bussiness_id', $value_id)->get();

        return view('admin.dashboard.index', compact('labarugi', 'neraca', 'sub_groups', 'sub_details', 'accountings', 'bussiness'));
    }

    public function create()
    {
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }

    public function backBisnis(Request $request)
    {
        $request->session()->forget('bussiness_id');
        return redirect()->route('admin.bussiness.index');
    }
}
