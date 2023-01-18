<?php

namespace App\Http\Controllers\Admin;

use App\Models\Group;
use App\Models\SubGroup;
use App\Models\Bussiness;
use App\Models\SubDetails;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;

class BussinessController extends Controller
{

    public function index()
    {
        $bussiness = Bussiness::latest()->when(request()->q, function ($bussiness) {
            $bussiness = $bussiness->where('name', 'like', '%' . request()->q . '%');
        })->paginate(10);

        return view('admin.bussiness.index', compact('bussiness'));
    }


    public function create()
    {
        return view('admin.bussiness.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            // 'image'             => 'required|image|mimes:png,jpg,jpeg',
            'name'              => 'required',
            'number'            => 'required',
            'address'           => 'required'
        ]);

        //upload image
        // $image = $request->file('image');
        // $image->storeAs('public/campaigns', $image->hashName());

        $bussiness = Bussiness::create([
            'name'              => $request->name,
            'number'            => $request->number,
            'address'           => $request->address,
            'user_id'           => auth()->user()->id,
            'image'             => null
        ]);

        $id = $bussiness->id;

        $aset = Group::create([
            'bussiness_id'      => $id,
            'name'     => 'Aset',
            'code'     => 'A001'
        ]);

        // if ($aset) {
        //     $asetlancar = SubGroup::create([
        //         'bussiness_id'      => $id,
        //         'group_id'      => $aset->id,
        //         'name'     => 'Aset Lancar',
        //         'code'     => 'AA001'
        //     ]);
        //     $asettetap = SubGroup::create([
        //         'bussiness_id'      => $id,
        //         'group_id'      => $aset->id,
        //         'name'     => 'Aset Tetap',
        //         'code'     => 'AB001'
        //     ]);

        //     if ($asetlancar && $asettetap) {
        //         SubDetails::create([
        //             'bussiness_id'      => $id,
        //             'group_id'      => $aset->id,
        //             'sub_group_id'      => $asetlancar->id,
        //             'name'     => 'Kas',
        //             'code'     => 'AA001001'
        //         ]);
        //         SubDetails::create([
        //             'bussiness_id'      => $id,
        //             'group_id'      => $aset->id,
        //             'sub_group_id'      => $asetlancar->id,
        //             'name'     => 'Kas di Bank',
        //             'code'     => 'AA001002'
        //         ]);
        //     }
        // }


        $kewajiban = Group::create([
            'bussiness_id'      => $id,
            'name'     => 'Kewajiban',
            'code'     => 'B001'
        ]);


        // if ($kewajiban) {
        //     SubGroup::create([
        //         'bussiness_id'      => $id,
        //         'group_id'      => $kewajiban->id,
        //         'name'     => 'Utang Pajak',
        //         'code'     => 'BA001'
        //     ]);
        // }


        $ekuitas = Group::create([
            'bussiness_id'      => $id,
            'name'     => 'Ekuitas',
            'code'     => 'C001'
        ]);

        // if ($ekuitas) {
        //     SubGroup::create([
        //         'bussiness_id'      => $id,
        //         'group_id'      => $ekuitas->id,
        //         'name'     => 'Laba diTahan',
        //         'code'     => 'CA001'
        //     ]);
        // }


        $pendapatan = Group::create([
            'bussiness_id'      => $id,
            'name'     => 'Pendapatan',
            'code'     => 'D001'
        ]);

        // if ($pendapatan) {
        //     SubGroup::create([
        //         'bussiness_id'      => $id,
        //         'group_id'      => $pendapatan->id,
        //         'name'     => 'Pendapatan Penjualan',
        //         'code'     => 'DA001'
        //     ]);
        //     SubGroup::create([
        //         'bussiness_id'      => $id,
        //         'group_id'      => $pendapatan->id,
        //         'name'     => 'Pendapatan Lainya',
        //         'code'     => 'DA0011'
        //     ]);
        // }

        $biaya = Group::create([
            'bussiness_id'      => $id,
            'name'     => 'Biaya',
            'code'     => 'E001'
        ]);

        // if ($biaya) {
        //     SubGroup::create([
        //         'bussiness_id'      => $id,
        //         'group_id'      => $biaya->id,
        //         'name'     => 'Biaya Administrasi',
        //         'code'     => 'EA001'
        //     ]);
        //     SubGroup::create([
        //         'bussiness_id'      => $id,
        //         'group_id'      => $biaya->id,
        //         'name'     => 'Biaya Promosi Kantor',
        //         'code'     => 'EA0011'
        //     ]);
        // }

        if ($id && $aset && $kewajiban && $ekuitas && $pendapatan && $biaya) {
            //redirect dengan pesan sukses
            return redirect()->route('admin.bussiness.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('admin.bussiness.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }


    public function show(Request $request, $id)
    {
        $row = Bussiness::where('id', $id)->first();
        $bussiness_id = Crypt::encrypt($row->id);
        $request->session()->put('bussiness_id', $bussiness_id);
        return redirect()->route('admin.dashboard.index');
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
}
