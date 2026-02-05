<div>
    @if ($showForm)
<div class="flex flex-col min-h-screen bg-gradient-to-br from-gray-50 to-blue-50 p-8">
    <div class="w-full max-w-2xl mx-auto">
        <div class="bg-white border-4 border-gray-800 p-8">
            <h1 class="text-3xl font-bold mb-2">
                {{ $editingId ? 'EDIT ADMIN SEKOLAH' : 'TAMBAH ADMIN SEKOLAH' }}
            </h1>
            <p class="text-gray-600 mb-6">Isi data admin</p>

            <form wire:submit.prevent="{{ $editingId ? 'update' : 'save' }}" class="space-y-4">

                <div>
                    <label class="block text-sm font-bold mb-2">SEKOLAH *</label>
                    <select wire:model="schoolId" class="w-full border-4 border-gray-800 p-3" required>
                        <option value="">Select School</option>
                        @foreach ($sekolah as $school)
                            <option value="{{ $school->sekolah_id }}">{{ $school->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-bold mb-2">USERNAME *</label>
                    <input
                        type="text"
                        wire:model.defer="username"
                        class="w-full border-4 border-gray-800 p-3"
                        required
                    />
                </div>

                <div>
                    <label class="block text-sm font-bold mb-2">
                        PASSWORD {{ $editingId ? '(optional)' : '*' }}
                    </label>
                    <input
                        type="password"
                        wire:model.defer="password"
                        class="w-full border-4 border-gray-800 p-3"
                    />
                </div>

                <div>
                    <label class="block text-sm font-bold mb-2">ROLE *</label>
                    <select wire:model="role" class="w-full border-4 border-gray-800 p-3">
                        <option value="School Admin">School Admin</option>
                    </select>
                </div>

                <div class="flex gap-4 pt-4">
                    <button class="flex-1 bg-gray-800 text-white p-4 text-xl font-bold">
                        {{ $editingId ? 'UPDATE' : 'TAMBAH' }} ADMIN
                    </button>

                    <button
                        type="button"
                        wire:click="resetForm"
                        class="flex-1 border-4 border-gray-800 p-4 text-xl font-bold"
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
                    <h1 class="text-3xl font-bold">MANAJEMEN ADMIN SEKOLAH</h1>
                    <p class="text-gray-600">
                        Total: {{ count($filteredAdmins) }} administrators
                    </p>
                </div>

                <button
                    wire:click="showCreateForm"
                    class="bg-gray-800 text-white px-6 py-3 font-bold"
                >
                    TAMBAH ADMIN
                </button>
            </div>

            <div class="flex items-center border-4 border-gray-800 mt-4">
                <input
                    type="text"
                    wire:model.debounce.300ms="searchQuery"
                    class="flex-1 p-3 focus:outline-none"
                    placeholder="Search by username, email, or school..."
                />
            </div>
        </div>

        <div class="space-y-4">
            @forelse ($filteredAdmins as $admin)
                <div class="bg-white border-4 border-gray-800 p-6">
                    <div class="flex items-center gap-4">
                        <div class="flex-1">
                            <h3 class="font-bold text-xl">{{ $admin->username }}</h3>
                            <p class="text-sm text-gray-600">
                                Sekolah: {{ optional($admin->sekolahRelation)->nama }}
                            </p>
                            <p class="text-sm text-gray-600">Role: {{ optional($admin->userGroupRelation)->nama }}</p>
                        </div>

                        <div class="flex gap-2">
                            <button
                                wire:click="edit({{ $admin->user_id }})"
                                class="border-4 border-gray-800 p-3"
                            >
                                EDIT
                            </button>

                            <button
                                wire:click="delete({{ $admin->user_id }})"
                                onclick="confirm('Delete admin {{ $admin->username }}?') || event.stopImmediatePropagation()"
                                class="border-4 border-red-500 p-3 text-red-500"
                            >
                                DELETE
                            </button>
                        </div>
                    </div>
                </div>
            @empty
                <div class="bg-white border-4 border-gray-800 p-12 text-center font-bold text-gray-500">
                    DATA ADMIN TIDAK DITEMUKAN
                </div>
            @endforelse
        </div>

    </div>
</div>
@endif

</div>
