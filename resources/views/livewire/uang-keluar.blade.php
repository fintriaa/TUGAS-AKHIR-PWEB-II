<x-slot name="header">
</x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            @if (session()->has('message'))
                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                  <div class="flex">
                    <div>
                      <p class="text-sm">{{ session('message') }}</p>
                    </div>
                  </div>
                </div>
            @endif
            <button wire:click="create()" class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded my-3">Masukkan Pengeluaran</button>
            @if($isOpen)
                @include('livewire.create-keluar')
            @endif
            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 w-20">No.</th>
                        <th class="px-4 py-2">Uang Keluar</th>
                        <th class="px-4 py-2">Keterangan</th>
                        <th class="px-4 py-2">Kategori</th>
                        <th class="px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($keluars as $post)
                    <tr>
                        <td class="border px-4 py-2">{{ $post->id }}</td>
                        <td class="border px-4 py-2">{{ $post->uang }}</td>
                        <td class="border px-4 py-2">{{ $post->deskripsi }}</td>
                        <td class="border px-4 py-2">{{ $post->kategori }}</td>
                        <td class="border px-4 py-2">
                        <button wire:click="edit({{ $post->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</button>
                            <button wire:click="delete({{ $post->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <h3 class="bg-orange-500 hover:bg-orange-500 text-white font-bold py-2 px-4 rounded my-5">Total Uang Keluar : {{ isset($post) ? $post->sum('uang') : 0 }} </h3>
        </div>
    </div>
</div>