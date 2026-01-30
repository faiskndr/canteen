<div
    x-data="{open:  @entangle('isShowForm')}" 
>
    <div
        x-show="open"
        x-transition.opacity
        class="fixed inset-0 z-40 bg-black/50"
        @click="open = false"
        @keydown.escape.window="open = false"
    ></div>

    <div 
        x-show="open"
        x-transition
        @click.self="open = false"
        class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-8 z-50"
    >
        <div class="bg-white border-4 border-gray-800 p-8 max-w-md w-full">
            <div class="flex items-center justify-between mb-6">
              <h2 class="text-2xl font-bold">BLOKIR KARTU</h2>
              <button
                wire:click="close"
                class="border-4 border-gray-800 p-2 hover:bg-gray-100"
              >
                
              </button>
            </div>

            <div class="mb-6">
              <p class="text-sm text-gray-600 mb-2">Nama Siswa: {{ $kartuModel?->siswaRelation->nama }}</p>
              <p class="text-sm text-gray-600 mb-2">ID Kartu: {{ $kartuModel?->no_kartu }}</p>
              <p class="text-sm font-bold">Saldo: Rp {{ $kartuModel?->saldo }}</p>
            </div>

            <div class="mb-4">
              <label class="block text-sm font-bold mb-2">ALASAN BLOKIR *</label>
              <textarea
                class="w-full border-4 border-gray-800 p-3 focus:outline-none focus:ring-4 focus:ring-gray-400"
                rows=3
                placeholder="Enter reason..."
                required
              ></textarea>
            </div>

            <div class="mb-6">
              <label class="flex items-center gap-3 cursor-pointer border-4 border-gray-800 p-4 hover:bg-gray-50">
                <input
                  type="checkbox"
                  class="w-6 h-6"
                />
                <div>
                  <span class="font-bold">KARTU HILANG</span>
                  <p class="text-xs text-gray-600 mt-1">
                    ID kartu baru akan dibuat dan saldo akan ditransfer
                  </p>
                </div>
              </label>
            </div>

            <div class="flex gap-4">
              <button
                class="flex-1 bg-red-600 text-white p-4 text-xl font-bold hover:bg-red-700 active:bg-red-800 disabled:bg-gray-400 disabled:cursor-not-allowed"
              >
                KONFIRMASI BLOKIR
              </button>
              <button
                wire:click="close"
                type="button"
                class="flex-1 border-4 border-gray-800 p-4 text-xl font-bold hover:bg-gray-100 active:bg-gray-200"
              >
                BATAL
              </button>
            </div>
        </div>
    </div>
    <div class="flex flex-col min-h-screen bg-gray-50 p-8">
    <div class="w-full max-w-6xl mx-auto">
        <div class="bg-white border-4 border-gray-800 p-8 mb-6">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <h1 class="text-3xl font-bold">MANAJEMEN KARTU</h1>
                    <p class="text-gray-600">Kelola kartu siswa</p>
                </div>
                <button
                    wire:click="goToDashboard"
                    class="flex items-center gap-2 border-4 border-gray-800 px-6 py-3 font-bold hover:bg-gray-100"
                >
                    ← KEMBALI
                </button>
            </div>

            <div class="flex items-center border-4 border-gray-800 mt-4">
                <div class="p-3 bg-gray-100 border-r-4 border-gray-800">
                    🔍
                </div>
                <input
                    type="text"
                    class="flex-1 p-3 focus:outline-none"
                    placeholder="Cari berdasarkan nama siswa, NIS, atau ID kartu..."
                />
            </div>
        </div>

        <div class="space-y-4">
            @forelse($kartu as $k)
                <div class="bg-white border-4 border-gray-800 p-6">
                    <div class="flex items-center gap-4">
                        <div class="w-16 h-16 border-4 border-gray-800 flex items-center justify-center bg-gray-100 flex-shrink-0">
                            💳
                        </div>

                        <div class="flex-1">
                            <div class="flex items-center gap-2 mb-2">
                                <h3 class="font-bold text-xl">
                                    {{ $k->siswaRelation->nama }}
                                </h3>
                                <span
                                    class="px-3 py-1 text-xs font-bold
                                        {{ $k->status === 'aktif'
                                            ? 'bg-green-100 border-2 border-green-600 text-green-700'
                                            : 'bg-red-100 border-2 border-red-600 text-red-700'
                                        }}"
                                >
                                    {{ $k->status }}
                                </span>
                            </div>

                            <p class="text-sm text-gray-600">
                                NIS: {{ $k->siswaRelation->nis }}
                            </p>
                            <p class="text-sm text-gray-600">
                                ID Kartu: {{ $k->no_kartu }}
                            </p>
                            <p class="text-sm font-bold">
                                Saldo: Rp {{ $k->saldo }}
                            </p>
                        </div>

                        <div class="flex gap-2">
                            @if ($k->status === 'aktif')
                                <button
                                    wire:click="open({{ $k->kartu_id }})"
                                    class="flex items-center gap-2 border-4 border-red-500 px-4 py-3 font-bold hover:bg-red-50 text-red-600"
                                >
                                    🚫 Blokir
                                </button>
                            @else
                                <button
                                    class="flex items-center gap-2 border-4 border-green-600 px-4 py-3 font-bold hover:bg-green-50 text-green-600"
                                >
                                    ✅ Aktivasi
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="bg-white border-4 border-gray-800 p-12 text-center">
                    <p class="text-gray-500 font-bold">Kartu tidak ditemukan</p>
                </div>
            @endforelse
        </div>
    </div>
</div>

</div>
