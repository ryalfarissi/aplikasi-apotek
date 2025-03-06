<form id="deleteForm" action="{{ route('obats.destroy', ['obat' => 0]) }}" method="POST">
    @csrf
    @method('DELETE')
    <table class="min-w-full bg-white border rounded-xl shadow-sm mb-5">
        <thead>
            <tr>
                <th class="px-4 py-2 text-left">
                    <input type="checkbox" class="form-checkbox rounded-[4px]" id="checkbox-all" />
                </th>
                <th class="px-4 py-2 text-left">Kode Obat</th>
                <th class="px-4 py-2 text-left">Nama Obat</th>
                <th class="px-4 py-2 text-left">Deskripsi</th>
                <th class="px-4 py-2 text-left">Stok</th>
                <th class="px-4 py-2 text-left">Harga Beli</th>
                <th class="px-4 py-2 text-left">Harga Jual</th>
                <th class="px-4 py-2 text-left">Kadaluarsa</th>
                <th class="px-4 py-2 text-left">Kategori</th>
                <th class="px-4 py-2 text-left">Satuan</th>
                <th class="px-4 py-2 text-left">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($obats as $obat)
                <tr class="border">
                    <td class="px-4 py-3">
                        <input type="checkbox" name="obats[]" value="{{ $obat->id }}"
                            class="form-checkbox rounded-[5px] checkbox-row" />
                    </td>
                    <td class="px-4 py-3">{{ $obat->kode_obat }}</td>
                    <td class="px-4 py-3">{{ $obat->nama_obat }}</td>
                    <td class="px-4 py-3">{{ $obat->deskripsi }}</td>
                    <td class="px-4 py-3">{{ $obat->stok }}</td>
                    <td class="px-4 py-3">{{ $obat->harga_beli }}</td>
                    <td class="px-4 py-3">{{ $obat->harga_jual }}</td>
                    <td class="px-4 py-3">{{ $obat->tanggal_kadaluarsa }}</td>
                    <td class="px-4 py-3">
                        {{ $obat->kategori ? $obat->kategori->nama_kategori : 'N/A' }}
                    </td>
                    <td class="px-4 py-3">
                        {{ $obat->satuan ? $obat->satuan->nama_satuan : 'N/A' }}
                    </td>
                    <td class="px-4 py-3">
                        <a href="{{ route('obats.edit', $obat->id) }}">
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M11.32 6.176H5c-1.105 0-2 .949-2 2.118v10.588C3 20.052 3.895 21 5 21h11c1.105 0 2-.948 2-2.118v-7.75l-3.914 4.144A2.46 2.46 0 0 1 12.81 16l-2.681.568c-1.75.37-3.292-1.263-2.942-3.115l.536-2.839c.097-.512.335-.983.684-1.352l2.914-3.086Z"
                                    clip-rule="evenodd" />
                                <path fill-rule="evenodd"
                                    d="M19.846 4.318a2.148 2.148 0 0 0-.437-.692 2.014 2.014 0 0 0-.654-.463 1.92 1.92 0 0 0-1.544 0 2.014 2.014 0 0 0-.654.463l-.546.578 2.852 3.02.546-.579a2.14 2.14 0 0 0 .437-.692 2.244 2.244 0 0 0 0-1.635ZM17.45 8.721 14.597 5.7 9.82 10.76a.54.54 0 0 0-.137.27l-.536 2.84c-.07.37.239.696.588.622l2.682-.567a.492.492 0 0 0 .255-.145l4.778-5.06Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</form>
<div class="mt-4">
    {{ $obats->appends([
            'search' => request('search'),
            'perPage' => request('perPage'),
            'sortBy' => request('sortBy'),
            'sortOrder' => request('sortOrder'),
        ])->links() }}
</div>
