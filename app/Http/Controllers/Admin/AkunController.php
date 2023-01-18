<?php

namespace App\Http\Controllers\Admin;

use App\Models\Group;
use App\Models\SubGroup;
use App\Models\Bussiness;
use App\Models\Accounting;
use App\Models\SubDetails;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;

class AkunController extends Controller
{
    public function index(Request $request)
    {
        $bussiness_id = $request->session()->get('bussiness_id');
        $value_id = Crypt::decrypt($bussiness_id);

        $bussiness = Bussiness::where('id', $value_id)->first();

        $neraca = Group::with('subGroups', 'subDetails', 'accountings')->where('bussiness_id', $value_id)->limit(3)->get();
        $labarugi = Group::with('subGroups', 'subDetails', 'accountings')->where('bussiness_id', $value_id)->whereNotIn('code', ['A001', 'B001', 'C001'])->get();
        $aset = Group::with('subGroups', 'subDetails', 'accountings')->where('bussiness_id', $value_id)->where('code', 'A001')->get();
        $kewajiban = Group::with('subGroups', 'subDetails', 'accountings')->where('bussiness_id', $value_id)->where('code', 'B001')->get();
        $ekuitas = Group::with('subGroups', 'subDetails', 'accountings')->where('bussiness_id', $value_id)->where('code', 'C001')->get();
        $pendapatan = Group::with('subGroups', 'subDetails', 'accountings')->where('bussiness_id', $value_id)->where('code', 'D001')->get();
        $biaya = Group::with('subGroups', 'subDetails', 'accountings')->where('bussiness_id', $value_id)->where('code', 'E001')->get();

        $sub_groups = SubGroup::where('bussiness_id', $value_id)->get();
        $sub_details = SubDetails::where('bussiness_id', $value_id)->get();
        $accountings = Accounting::where('bussiness_id', $value_id)->get();

        return view('admin.accounting.index', compact('biaya', 'pendapatan', 'ekuitas', 'kewajiban', 'aset', 'labarugi', 'neraca', 'sub_groups', 'sub_details', 'accountings', 'bussiness'));
    }

    public function create(Request $request)
    {

        $bussiness_id = $request->session()->get('bussiness_id');
        $value_id = Crypt::decrypt($bussiness_id);

        $bussiness = Bussiness::where('id', $value_id)->first();
        $neraca = Group::with('subGroups', 'subDetails', 'accountings')->where('bussiness_id', $value_id)->limit(3)->get();
        $labarugi = Group::with('subGroups', 'subDetails', 'accountings')->where('bussiness_id', $value_id)->whereNotIn('code', ['A001', 'B001', 'C001'])->get();
        $groups = Group::where('bussiness_id', $value_id)->get();
        $sub_groups = SubGroup::where('bussiness_id', $value_id)->get();
        $sub_details = SubDetails::where('bussiness_id', $value_id)->get();

        return view('admin.accounting.create', compact('groups', 'sub_groups', 'sub_details'));
    }


    public function getSubGroup(Request $request)
    {
        $bussiness_id = $request->session()->get('bussiness_id');
        $value_id = Crypt::decrypt($bussiness_id);
        $sub_group = SubGroup::where('group_id', $request->groupId)
            ->where('bussiness_id', $value_id)
            ->pluck('id', 'name');
        return response()->json($sub_group);
    }

    public function getDetails(Request $request)
    {
        $bussiness_id = $request->session()->get('bussiness_id');
        $value_id = Crypt::decrypt($bussiness_id);
        $sub_group = SubDetails::where('sub_group_id', $request->subId)
            ->where('bussiness_id', $value_id)
            ->where('group_id', $request->groupId)
            ->pluck('id', 'name');
        return response()->json($sub_group);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'             => 'required',
            'group_id'         => 'required'
        ], [
            'required' => 'Field ini tidak boleh kosong'
        ]);

        $subGroup = $request->sub_group_id;
        $details = $request->subDetails;

        $bussiness_id = $request->session()->get('bussiness_id');
        $value_id = Crypt::decrypt($bussiness_id);

        if ($subGroup == 0) {
            $subGroups = SubGroup::create([
                'name'             => $request->name,
                'bussiness_id'     => $value_id,
                'group_id'         => $request->group_id,
                'code'             => "TEST"
            ]);

            if ($subGroups) {
                //redirect dengan pesan sukses
                return redirect()->route('admin.accounting.index')->with(['success' => 'Data Berhasil Disimpan!']);
            } else {
                //redirect dengan pesan error
                return redirect()->route('admin.accounting.index')->with(['error' => 'Data Gagal Disimpan!']);
            }
        } else if ($details == 0) {
            $subDetails = SubDetails::create([
                'name'             => $request->name,
                'bussiness_id'     => $value_id,
                'group_id'         => $request->group_id,
                'sub_group_id'     => $request->sub_group_id,
                'code'             => "TEST"
            ]);
            if ($subDetails) {
                //redirect dengan pesan sukses
                return redirect()->route('admin.accounting.index')->with(['success' => 'Data Berhasil Disimpan!']);
            } else {
                //redirect dengan pesan error
                return redirect()->route('admin.accounting.index')->with(['error' => 'Data Gagal Disimpan!']);
            }
        } else {
            $accounting = Accounting::create([
                'name'             => $request->name,
                'bussiness_id'             => $value_id,
                'group_id'             => $request->group_id,
                'sub_group_id'       => $request->sub_group_id,
                'sub_details_id'   => $request->subDetails,
                'code'          => "TEST",
                'saldo'          => 0
            ]);
            if ($accounting) {
                //redirect dengan pesan sukses
                return redirect()->route('admin.accounting.index')->with(['success' => 'Data Berhasil Disimpan!']);
            } else {
                //redirect dengan pesan error
                return redirect()->route('admin.accounting.index')->with(['error' => 'Data Gagal Disimpan!']);
            }
        }
    }
}
