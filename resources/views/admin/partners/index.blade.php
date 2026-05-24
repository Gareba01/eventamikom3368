@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Manajemen Partner</h1>
        <a href="{{ route('admin.partners.create') }}"
           class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition">
            + Tambah Partner
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- Search Form --}}
    <form method="GET" action="{{ route('admin.partners.index') }}" class="mb-4">
        <div class="flex gap-2">
            <input type="text" name="search" value="{{ $search ?? '' }}"
                   placeholder="Cari partner..."
                   class="border border-gray-300 rounded-lg px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-indigo-400">
            <button type="submit"
                    class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition">
                Cari
            </button>
            @if($search)
                <a href="{{ route('admin.partners.index') }}"
                   class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300 transition">
                    Reset
                </a>
            @endif
        </div>
    </form>

    <div class="bg-white rounded-xl shadow overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Logo</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Dibuat</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($partners as $partner)
                <tr>
                    <td class="px-6 py-4 text-sm text-gray-900">{{ $partner->id }}</td>
                    <td class="px-6 py-4">
                        <img src="{{ $partner->logo_url }}" alt="{{ $partner->name }}"
                             class="h-10 w-10 object-contain rounded"
                             onerror="this.src='https://placehold.co/40x40?text=Logo'">
                    </td>
                    <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $partner->name }}</td>
                    <td class="px-6 py-4 text-sm text-gray-500">{{ $partner->created_at->format('d M Y') }}</td>
                    <td class="px-6 py-4 text-sm flex gap-2">
                        <a href="{{ route('admin.partners.edit', $partner) }}"
                           class="bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500 transition">
                            Edit
                        </a>
                        <form action="{{ route('admin.partners.destroy', $partner) }}" method="POST"
                              onsubmit="return confirm('Yakin hapus partner ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 transition">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-4 text-center text-gray-400">
                        Belum ada partner{{ $search ? ' dengan kata kunci "'.$search.'"' : '' }}.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $partners->appends(['search' => $search])->links() }}
    </div>
</div>
@endsection