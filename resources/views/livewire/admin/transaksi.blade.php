   <div class="flex flex-col min-h-screen bg-gray-50 p-8">
      <div class="w-full max-w-6xl mx-auto">
        <div class="bg-white border-4 border-gray-800 p-8 mb-6">
          <div class="flex items-center justify-between mb-4">
            <div>
              <h1 class="text-3xl font-bold">DAFTAR TRANSAKSI</h1>
              <p class="text-gray-600">Transaksi Terbaru</p>
            </div>
            <div class="flex gap-4">
              <button
                class="flex items-center gap-2 bg-green-600 text-white px-6 py-3 font-bold hover:bg-green-700"
              >
                <Download size={20} />
                EXPORT CSV
              </button>
              <button
                wire:click="goToDashboard"
                class="flex items-center gap-2 border-4 border-gray-800 px-6 py-3 font-bold hover:bg-gray-100"
              >
                <ArrowLeft size={20} />
                KEMBALI
              </button>
            </div>
          </div>

          <div class="grid grid-cols-3 gap-4 mb-4">
            <div class="border-4 border-gray-800 p-4 bg-gray-50">
              <p class="text-sm text-gray-600 mb-1">TOTAL TRANSAKSI</p>
              <p class="text-2xl font-bold">{{ $total_transaksi }}</p>
            </div>
            <div class="border-4 border-green-600 p-4 bg-green-50">
              <p class="text-sm text-gray-600 mb-1">TOTAL TOP-UP</p>
              <p class="text-2xl font-bold text-green-600">Rp {{ $total_top_up }}</p>
            </div>
             <div class="border-4 border-red-500 p-4 bg-red-50">
              <p class="text-sm text-gray-600 mb-1">TOTAL DIHABISKAN</p>
              <p class="text-2xl font-bold text-red-600">Rp {{ $total_dihabiskan }}</p>
            </div>
             <div class="border-4 border-gray-800 p-4 bg-gray-50">
              <p class="text-sm text-gray-600 mb-1">SISA</p>
              <p class="text-2xl font-bold text-gray-600">Rp {{ $total_top_up - $total_dihabiskan }}</p>
            </div>
          </div>

          <div class="flex gap-4 mb-4">
            <div class="flex-1 flex items-center border-4 border-gray-800">
              <div class="p-3 bg-gray-100 border-r-4 border-gray-800">
                <Search size={20} />
              </div>
              <input
                wire:model.live="cari"
                type="text"
                class="flex-1 p-3 focus:outline-none"
                placeholder="Cari berdasarkan nama siswa atau NIS"
              />
            </div>
            <div class="flex items-center border-4 border-gray-800">
              <div class="p-3 bg-gray-100 border-r-4 border-gray-800">
                <Filter size={20} />
              </div>
              <select
                wire:model.live="jenis_transaksi"
                class="p-3 focus:outline-none font-bold"
              >
                <option value="all">Semua</option>
                <option value="debit">Belanja</option>
                <option value="top-up">Top Up</option>
              </select>
            </div>
          </div>
        </div>

        <div class="space-y-4">
            @forelse($transaksi as $t)
              <div key={txn.id} class="bg-white border-4 border-gray-800 p-6">
                <div class="flex items-start justify-between">
                  <div class="flex-1">
                    <div class="flex items-center gap-2 mb-2">
                      <span
                        class="px-3 py-1 text-xs font-bold {{
                            $t->jenis === 'top-up'
                            ? 'bg-green-100 border-2 border-green-600 text-green-700'
                            : 'bg-red-100 border-2 border-red-600 text-red-700'
                            }}"
                      >
                        
                      </span>
                      <span class="font-bold text-lg"></span>
                    </div>
                    <p class="text-sm text-gray-600 mb-1">
                      Siswa: {{ $t->kartuRelation->siswaRelation->nama }} (NIS: {{ $t->kartuRelation->siswaRelation->nis }})
                    </p>
                    <p class="text-xs text-gray-500">
                      {{ $t->dibuat_pada }}
                    </p>
                  </div>
                  <div class="text-right">
                    <p
                      class="text-2xl font-bold mb-1 {{
                        $t->jenis === 'top-up' ? 'text-green-600' : 'text-red-600'
                        }}"
                    >
                      {{ $t->jenis === 'top-up' ? '+' : '-'}}Rp {{ abs($t->saldo_awal - $t->saldo_akhir) }}
                    </p>
                    <p class="text-sm text-gray-600">
                      Saldo: Rp {{ $t->saldo_akhir }}
                    </p>
                  </div>
                </div>
              </div>
            @empty
                <div class="bg-white border-4 border-gray-800 p-12 text-center">
                    <p class="text-gray-500 font-bold">TRANSAKSI TIDAK DITEMUKAN</p>
                </div>
            @endforelse
            <div class="mt-4">
                {{ $transaksi->links('vendor.pagination.tailwind') }}
            </div>
        </div>
      </div>
    </div>