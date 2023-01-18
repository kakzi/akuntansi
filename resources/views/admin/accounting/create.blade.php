@extends('layouts.app', ['title' => 'Tambah Akun - Admin'])
@section('content')
<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-300">
    <div class="container mx-auto px-6 py-8">

        <div class="p-6 bg-white rounded-md shadow-md">
            <h2 class="text-lg text-gray-700 font-semibold capitalize">Tambah Akun Baru</h2>
            <hr class="mt-4">
            <form action="{{ route('admin.accounting.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div>
                    <label class="text-gray-700" for="name">Nama Akun</label>
                    <input class="form-input w-full mt-2 rounded-md bg-gray-200 focus:bg-white" type="text" name="name" value="{{ old('name') }}" placeholder="Nama Akun">
                    @error('name')
                        <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                            <div class="px-4 py-2">
                                <p class="text-gray-600 text-sm">{{ $message }}</p>
                            </div>
                        </div>
                    @enderror
                </div>
                <div class="grid grid-cols-1 gap-3 mt-3 sm:grid-cols-3">
                    <div>
                        <label class="text-gray-700" for="group_id">Group</label>
                        <select class="w-full border bg-gray-200 focus:bg-white rounded px-3 py-2 outline-none mt-3" name="group_id" id="group_id">
                            @foreach($groups as $group)
                                <option class="py-1" value="{{ $group->id }}">{{ $group->name }}</option>
                            @endforeach
                        </select>
                        @error('group_id')
                            <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                <div class="px-4 py-2">
                                    <p class="text-gray-600 text-sm">{{ $message }}</p>
                                </div>
                            </div>
                        @enderror
                    </div>
                    
                    <div>
                        <label class="text-gray-700" for="sub_group_id">Sub Group</label>
                        <select class="w-full border bg-gray-200 focus:bg-white rounded px-3 py-2 outline-none mt-3" name="sub_group_id" id="sub_group_id">
                            <option value="0" selected>---Pilih Sub Group---</option>
                        </select>
                        @error('sub_group_id')
                            <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                <div class="px-4 py-2">
                                    <p class="text-gray-600 text-sm">{{ $message }}</p>
                                </div>
                            </div>
                        @enderror
                    </div>
                    <div>
                        <label class="text-gray-700" for="subDetails">Details</label>
                        <select class="w-full border bg-gray-200 focus:bg-white rounded px-3 py-2 outline-none mt-3" name="subDetails" id="subDetails">
                            <option selected value="0">---Pilih Sub Details---</option>
                        </select>
                        @error('subDetails')
                            <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                <div class="px-4 py-2">
                                    <p class="text-gray-600 text-sm">{{ $message }}</p>
                                </div>
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="mt-3">
                    <label class="text-gray-700" for="saldo">Saldo Awal</label>
                    <input class="form-input w-full mt-2 rounded-md bg-gray-200 focus:bg-white" type="text" name="saldo" value="{{ old('saldo') }}" placeholder="Saldo">
                    @error('saldo')
                        <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                            <div class="px-4 py-2">
                                <p class="text-gray-600 text-sm">{{ $message }}</p>
                            </div>
                        </div>
                    @enderror
                </div>

                <div class="mt-5">
                        <div class="bg-teal-100 border-t-4 border-teal-500 rounded text-teal-900 px-4 py-3 shadow-md" role="alert">
                            <div class="flex">
                            <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                            <div>
                                <p class="font-bold">Catatan</p>
                                <p class="text-sm">1. Field {Nama Akun}, {Group}, dan {SubGroup} harus di isi!
                                    <br>2. Jika {SubGroup} di kasus tertentu belum ada akunya, akun otomatis ikut {SubGroup} begitu pula dengan {Details}.
                                
                                </p>
                            </div>
                            </div>
                        </div>
                </div>
            
                <div class="justify-start mt-5">
                    <button type="submit" class="px-4 py-2 bg-indigo-700 text-white rounded-md hover:bg-indigo-800 focus:outline-none focus:bg-indigo-600">Simpan</button>
                    <button type="cancel" class="px-4 py-2 bg-gray-700 text-white rounded-md hover:bg-gray-800 focus:outline-none focus:bg-gray-600">Batal</button>
                </div>
            </form>
        </div>
        
    </div>
</main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.7.0/tinymce.min.js"></script>
<script>
    tinymce.init({selector:'textarea'});
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{url('js/accounting.js')}}"></script>
@endsection