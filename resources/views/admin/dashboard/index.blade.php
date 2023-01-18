@extends('layouts.app', ['title' => 'Dashboard - Admin'])

@section('content')
<main class="flex-1 overflow-x-hidden overflow-y-auto text-gray-900 bg-gray-300 body-font">
        <div class="container px-5 py-10 mx-auto">
        <h1 class="text-3xl text-left font-bold title-font text-indigo-600 ml-3">Dashboard</h1>
        <p class="text-md text-left font-medium title-font text-gray-900 mb-5 ml-3">{{ $bussiness->name }}</p>
        <div class="flex flex-wrap m-2">
            <div class="p-1 md:w-1/2 w-full">
                <div class="h-full bg-white bg-opacity-40 rounded-lg">
                    <div class="bg-gray-800 rounded-t-lg p-2">
                        <p class="text-xl text-white text-center font-bold">Laporan Neraca Keuangan</p>
                        <p class="text-sm text-white text-center">Tanggal : {{ date('Y-m-d'); }}</p>
                    </div>
                    <div class="p-6">
                        @foreach ($neraca as $g)
                            <tr>
                                <div class="grid grid-cols-2">
                                    <div>
                                        <p class="font-bold">{{ $g->name }}</p>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-right">-</p>
                                    </div>
                                </div>
                            </tr>
                            @foreach ($g->subGroups as $s)
                                <tr>
                                    <div class="grid grid-cols-2">
                                        <div>
                                            <p class="font-semibold">{{ $s->name }}</p>
                                        </div>
                                        <div>
                                            <p class="font-semibold text-right">-</p>
                                        </div>
                                    </div>
                                </tr>
                                @foreach ($g->subDetails as $sd)
                                    @if ($s->id == $sd->sub_group_id)
                                        <tr>
                                            <div class="grid grid-cols-2">
                                                <div>
                                                    <p class="ml-6 font-normal">{{ $sd->name }}</p>
                                                </div>
                                                <div>
                                                    <p class="font-semibold text-right">-</p>
                                                </div>
                                            </div>
                                        </tr>
                                        @foreach ($g->accountings as $a)
                                            @if ($sd->id == $a->sub_details_id)
                                                <tr>
                                                    <div class="grid grid-cols-2">
                                                        <div>
                                                            <p class="ml-9 font-normal">{{ $a->name }}</p>
                                                        </div>
                                                        <div>
                                                            <p class="font-semibold text-right">-</p>
                                                        </div>
                                                    </div>
                                                </tr>
                                            @endif
                                        @endforeach    
                                    @endif
                                @endforeach
                            @endforeach
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="p-1 md:w-1/2 w-full">
                <div class="h-full bg-white bg-opacity-40 rounded-lg">
                    <div class="bg-gray-800 rounded-t-lg p-2">
                        <p class="text-xl text-white text-center font-bold">Laporan Laba Rugi</p>
                        <p class="text-sm text-white text-center">Tanggal : {{ date('Y-m-d'); }}</p>
                    </div>
                    <div class="p-6">
                        @foreach ($labarugi as $g)
                            <tr>
                                <div class="grid grid-cols-2">
                                    <div>
                                        <p class="font-bold">{{ $g->name }}</p>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-right">-</p>
                                    </div>
                                </div>
                            </tr>
                            @foreach ($g->subGroups as $s)
                                <tr>
                                    <div class="grid grid-cols-2">
                                        <div>
                                            <p class="font-semibold">{{ $s->name }}</p>
                                        </div>
                                        <div>
                                            <p class="font-semibold text-right">-</p>
                                        </div>
                                    </div>
                                </tr>
                                @foreach ($g->subDetails as $sd)
                                    @if ($s->id == $sd->sub_group_id)
                                        <tr>
                                            <div class="grid grid-cols-2">
                                                <div>
                                                    <p class="ml-6 font-normal">{{ $sd->name }}</p>
                                                </div>
                                                <div>
                                                    <p class="font-semibold text-right">-</p>
                                                </div>
                                            </div>
                                        </tr>
                                        @foreach ($g->accountings as $a)
                                            @if ($sd->id == $a->sub_details_id)
                                                <tr>
                                                    <div class="grid grid-cols-2">
                                                        <div>
                                                            <p class="ml-9 font-normal">{{ $a->name }}</p>
                                                        </div>
                                                        <div>
                                                            <p class="font-semibold text-right">-</p>
                                                        </div>
                                                    </div>
                                                </tr>
                                            @endif
                                        @endforeach    
                                    @endif
                                @endforeach
                            @endforeach
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        </div>
</main>
@endsection
