@extends('layouts.app', ['title' => 'Daftar Akun - Admin'])

@section('content')
<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-300">
    <div class="container mx-auto px-6 py-8">

        <div class="flex items-center ml-3">
            <button class="text-white focus:outline-none hover:bg-indigo-600 bg-indigo-800 px-4 py-2 shadow-sm rounded-md">
                <a href="{{ route('admin.accounting.create') }}">Tambah Akun Baru</a>
            </button>
        </div>

        <div class="flex flex-wrap m-2">
            <div class="p-1 md:w-1/3 w-full">
                <div class="h-full bg-white bg-opacity-40 rounded-lg">
                    <div class="bg-gray-800 rounded-t-lg p-2">
                        <p class="text-xl text-white text-center font-bold">Aset</p>
                    </div>
                    <div class="p-6">
                        @foreach ($aset as $g)
                            <tr>
                                <div class="grid grid-cols-2">
                                    <div>
                                        <p class="font-bold">{{ $g->name }}</p>
                                    </div>
                                    <div>
                                        
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
                                                    <div class="text-right">
                                                        <a class="text-xs font-semibold inline-block py-1 px-2 rounded-full text-teal-200 bg-teal-600 last:mr-0 mr-1 mb-1">
                                                            ubah
                                                          </a>
                                                        <a class="text-xs font-semibold inline-block py-1 px-2 rounded-full text-red-200 bg-red-600 last:mr-0 mr-1 mb-1">
                                                            hapus
                                                          </a>
                                                    </div>
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
                                                            <div class="text-right">
                                                                <a class="text-xs font-semibold inline-block py-1 px-2 rounded-full text-teal-200 bg-teal-600 last:mr-0 mr-1 mb-1">
                                                                    ubah
                                                                  </a>
                                                                <a class="text-xs font-semibold inline-block py-1 px-2 rounded-full text-red-200 bg-red-600 last:mr-0 mr-1 mb-1">
                                                                    hapus
                                                                  </a>
                                                            </div>
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
            <div class="p-1 md:w-1/3 w-full">
                <div class="h-full bg-white bg-opacity-40 rounded-lg">
                    <div class="bg-gray-800 rounded-t-lg p-2">
                        <p class="text-xl text-white text-center font-bold">Kewajiban</p>
                    </div>
                    <div class="p-6">
                        @foreach ($kewajiban as $g)
                            <tr>
                                <div class="grid grid-cols-2">
                                    <div>
                                        <p class="font-bold">{{ $g->name }}</p>
                                    </div>
                                    <div>
                                    
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
                                            <div class="text-right">
                                                <a class="text-xs font-semibold inline-block py-1 px-2 rounded-full text-teal-200 bg-teal-600 last:mr-0 mr-1 mb-1">
                                                    ubah
                                                  </a>
                                                <a class="text-xs font-semibold inline-block py-1 px-2 rounded-full text-red-200 bg-red-600 last:mr-0 mr-1 mb-1">
                                                    hapus
                                                  </a>
                                            </div>
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
                                                    <div class="text-right">
                                                        <a class="text-xs font-semibold inline-block py-1 px-2 rounded-full text-teal-200 bg-teal-600 last:mr-0 mr-1 mb-1">
                                                            ubah
                                                          </a>
                                                        <a class="text-xs font-semibold inline-block py-1 px-2 rounded-full text-red-200 bg-red-600 last:mr-0 mr-1 mb-1">
                                                            hapus
                                                          </a>
                                                    </div>
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
                                                            <div class="text-right">
                                                                <a class="text-xs font-semibold inline-block py-1 px-2 rounded-full text-teal-200 bg-teal-600 last:mr-0 mr-1 mb-1">
                                                                    ubah
                                                                  </a>
                                                                <a class="text-xs font-semibold inline-block py-1 px-2 rounded-full text-red-200 bg-red-600 last:mr-0 mr-1 mb-1">
                                                                    hapus
                                                                  </a>
                                                            </div>
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
            <div class="p-1 md:w-1/3 w-full">
                <div class="h-full bg-white bg-opacity-40 rounded-lg">
                    <div class="bg-gray-800 rounded-t-lg p-2">
                        <p class="text-xl text-white text-center font-bold">Ekuitas</p>
                    </div>
                    <div class="p-6">
                        @foreach ($ekuitas as $g)
                            <tr>
                                <div class="grid grid-cols-2">
                                    <div>
                                        <p class="font-bold">{{ $g->name }}</p>
                                    </div>
                                    <div>
                                        
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
                                            <div class="text-right">
                                                <a class="text-xs font-semibold inline-block py-1 px-2 rounded-full text-teal-200 bg-teal-600 last:mr-0 mr-1 mb-1">
                                                    ubah
                                                  </a>
                                                <a class="text-xs font-semibold inline-block py-1 px-2 rounded-full text-red-200 bg-red-600 last:mr-0 mr-1 mb-1">
                                                    hapus
                                                  </a>
                                            </div>
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
                                                    <div class="text-right">
                                                        <a class="text-xs font-semibold inline-block py-1 px-2 rounded-full text-teal-200 bg-teal-600 last:mr-0 mr-1 mb-1">
                                                            ubah
                                                          </a>
                                                        <a class="text-xs font-semibold inline-block py-1 px-2 rounded-full text-red-200 bg-red-600 last:mr-0 mr-1 mb-1">
                                                            hapus
                                                          </a>
                                                    </div>
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
                                                            <div class="text-right">
                                                                <a class="text-xs font-semibold inline-block py-1 px-2 rounded-full text-teal-200 bg-teal-600 last:mr-0 mr-1 mb-1">
                                                                    ubah
                                                                  </a>
                                                                <a class="text-xs font-semibold inline-block py-1 px-2 rounded-full text-red-200 bg-red-600 last:mr-0 mr-1 mb-1">
                                                                    hapus
                                                                  </a>
                                                            </div>
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
            <div class="p-1 md:w-1/3 w-full">
                <div class="h-full bg-white bg-opacity-40 rounded-lg">
                    <div class="bg-gray-800 rounded-t-lg p-2">
                        <p class="text-xl text-white text-center font-bold">Pendapatan</p>
                    </div>
                    <div class="p-6">
                        @foreach ($pendapatan as $g)
                            <tr>
                                <div class="grid grid-cols-2">
                                    <div>
                                        <p class="font-bold">{{ $g->name }}</p>
                                    </div>
                                    <div>
                                      
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
                                            <div class="text-right">
                                                <a class="text-xs font-semibold inline-block py-1 px-2 rounded-full text-teal-200 bg-teal-600 last:mr-0 mr-1 mb-1">
                                                    ubah
                                                  </a>
                                                <a class="text-xs font-semibold inline-block py-1 px-2 rounded-full text-red-200 bg-red-600 last:mr-0 mr-1 mb-1">
                                                    hapus
                                                  </a>
                                            </div>
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
                                                    <div class="text-right">
                                                        <a class="text-xs font-semibold inline-block py-1 px-2 rounded-full text-teal-200 bg-teal-600 last:mr-0 mr-1 mb-1">
                                                            ubah
                                                          </a>
                                                        <a class="text-xs font-semibold inline-block py-1 px-2 rounded-full text-red-200 bg-red-600 last:mr-0 mr-1 mb-1">
                                                            hapus
                                                          </a>
                                                    </div>
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
                                                            <div class="text-right">
                                                                <a class="text-xs font-semibold inline-block py-1 px-2 rounded-full text-teal-200 bg-teal-600 last:mr-0 mr-1 mb-1">
                                                                    ubah
                                                                  </a>
                                                                <a class="text-xs font-semibold inline-block py-1 px-2 rounded-full text-red-200 bg-red-600 last:mr-0 mr-1 mb-1">
                                                                    hapus
                                                                  </a>
                                                            </div>
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
            <div class="p-1 md:w-1/3 w-full">
                <div class="h-full bg-white bg-opacity-40 rounded-lg">
                    <div class="bg-gray-800 rounded-t-lg p-2">
                        <p class="text-xl text-white text-center font-bold">Biaya</p>
                    </div>
                    <div class="p-6">
                        @foreach ($biaya as $g)
                            <tr>
                                <div class="grid grid-cols-2">
                                    <div>
                                        <p class="font-bold">{{ $g->name }}</p>
                                    </div>
                                    <div>
                                       
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
                                            <div class="text-right">
                                                <a class="text-xs font-semibold inline-block py-1 px-2 rounded-full text-teal-200 bg-teal-600 last:mr-0 mr-1 mb-1">
                                                    ubah
                                                  </a>
                                                <a class="text-xs font-semibold inline-block py-1 px-2 rounded-full text-red-200 bg-red-600 last:mr-0 mr-1 mb-1">
                                                    hapus
                                                  </a>
                                            </div>
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
                                                    <div class="text-right">
                                                        <a class="text-xs font-semibold inline-block py-1 px-2 rounded-full text-teal-200 bg-teal-600 last:mr-0 mr-1 mb-1">
                                                            ubah
                                                          </a>
                                                        <a class="text-xs font-semibold inline-block py-1 px-2 rounded-full text-red-200 bg-red-600 last:mr-0 mr-1 mb-1">
                                                            hapus
                                                          </a>
                                                    </div>
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
                                                            <div class="text-right">
                                                                <a class="text-xs font-semibold inline-block py-1 px-2 rounded-full text-teal-200 bg-teal-600 last:mr-0 mr-1 mb-1">
                                                                    ubah
                                                                  </a>
                                                                <a class="text-xs font-semibold inline-block py-1 px-2 rounded-full text-red-200 bg-red-600 last:mr-0 mr-1 mb-1">
                                                                    hapus
                                                                  </a>
                                                            </div>
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
<script>
    //ajax delete
    function destroy(id) {
        var id = id;
        var token = $("meta[name='csrf-token']").attr("content");

        Swal.fire({
            title: 'Apakah Kamu Yakin?',
            text: "Data yang Terhapus tidak bisa dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'BATAL',
            confirmButtonText: 'YA, HAPUS!',
        }).then((result) => {
            if (result.isConfirmed) {
                //ajax delete
                jQuery.ajax({
                    url: `/admin/accounting/${id}`,
                    data: {
                        "id": id,
                        "_token": token
                    },
                    type: 'DELETE',
                    success: function (response) {
                        if (response.status == "success") {
                            Swal.fire({
                                icon: 'success',
                                title: 'BERHASIL!',
                                text: 'DATA BERHASIL DIHAPUS!',
                                showConfirmButton: false,
                                timer: 3000
                            }).then(function () {
                                location.reload();
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'GAGAL!',
                                text: 'DATA GAGAL DIHAPUS!',
                                showConfirmButton: false,
                                timer: 3000
                            }).then(function () {
                                location.reload();
                            });
                        }
                    }
                });
            }
        })
    }
</script>
@endsection