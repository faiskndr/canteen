<div>
    @if ($showForm)
        <div class="flex flex-col min-h-screen bg-gradient-to-br from-gray-50 to-blue-50 p-8">
            <div class="w-full max-w-2xl mx-auto">
                <div class="bg-white border-4 border-gray-800 p-8">
                    <h1 class="text-3xl font-bold mb-2 text-gray-900">
                        {{ $editingId ? 'EDIT SEKOLAH' : 'TAMBAH SEKOLAH' }}
                    </h1>
                    <p class="text-gray-600 mb-6">Isi data sekolah</p>

                    <form wire:submit.prevent="{{ $editingId ? 'update' : 'save' }}" class="space-y-4">
                        <div>
                            <label class="block text-sm font-bold mb-2">NAMA SEKOLAH *</label>
                            <input
                                type="text"
                                wire:model.defer="name"
                                class="w-full border-4 border-gray-800 p-3 focus:outline-none focus:ring-4 focus:ring-gray-400"
                                required
                            />
                        </div>

                        <div>
                            <label class="block text-sm font-bold mb-2">ALAMAT *</label>
                            <textarea
                                wire:model.defer="address"
                                rows="3"
                                class="w-full border-4 border-gray-800 p-3 focus:outline-none focus:ring-4 focus:ring-gray-400"
                                required
                            ></textarea>
                        </div>

                        <div>
                            <label class="block text-sm font-bold mb-2">STATUS *</label>
                            <select
                                wire:model="status"
                                class="w-full border-4 border-gray-800 p-3"
                                required
                            >
                                <option value="aktif">Active</option>
                                <option value="non-aktif">Inactive</option>
                            </select>
                        </div>

                        <div class="flex gap-4 pt-4">
                            <button
                                type="submit"
                                class="flex-1 bg-gray-800 text-white p-4 text-xl font-bold hover:bg-gray-700"
                            >
                                {{ $editingId ? 'UPDATE' : 'TAMBAH' }} SEKOLAH
                            </button>

                            <button
                                type="button"
                                wire:click="resetForm"
                                class="flex-1 border-4 border-gray-800 p-4 text-xl font-bold hover:bg-gray-50"
                            >
                                BATAL
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @else
        <div class="flex flex-col min-h-screen bg-gradient-to-br from-gray-50 to-blue-50 p-8">
            <div class="w-full max-w-6xl mx-auto">

                <div class="bg-white border-4 border-gray-800 p-8 mb-6">
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <h1 class="text-3xl font-bold">MANAJEMEN SEKOLAH</h1>
                            <p class="text-gray-600">Total: {{ count($filteredSchools) }} sekolah</p>
                        </div>
                        <button
                            wire:click="showCreateForm"
                            class="bg-gray-800 text-white px-6 py-3 font-bold hover:bg-gray-700"
                        >
                            TAMBAH SEKOLAH
                        </button>
                    </div>

                    <div class="flex items-center border-4 border-gray-800 mt-4">
                        <input
                            type="text"
                            wire:model.debounce.300ms="searchQuery"
                            class="flex-1 p-3 focus:outline-none"
                            placeholder="Cari berdasar nama atau alamat..."
                        />
                    </div>
                </div>

                <div class="space-y-4">
                    @forelse ($filteredSchools as $school)
                        <div class="bg-white border-4 border-gray-800 p-6">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h3 class="font-bold text-xl">{{ $school->nama }}</h3>
                                    <p class="text-sm text-gray-600">{{ $school->alamat }}</p>
                                </div>

                                <div class="flex gap-2">
                                    <button
                                        wire:click="edit({{ $school->sekola_id }})"
                                        class="border-4 border-gray-800 p-3"
                                    >
                                        EDIT
                                    </button>

                                    <button
                                        wire:click="delete({{ $school->sekolah_id }})"
                                        onclick="confirm('Delete school {{ $school->nama }}?') || event.stopImmediatePropagation()"
                                        class="border-4 border-red-500 p-3 text-red-500"
                                    >
                                        DELETE
                                    </button>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="bg-white border-4 border-gray-800 p-12 text-center font-bold text-gray-500">
                            DATA SEKOLAH TIDAK DITEMUKAN
                        </div>
                    @endforelse
                    <div class="mt-4">
                        {{$filteredSchools->links()}}
                    </div>
                </div>

            </div>
        </div>
@endif

</div>
