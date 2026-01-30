    <div class="flex flex-col items-center min-h-screen bg-gray-50 p-4 md:p-8">
      <div class="w-full max-w-2xl bg-white border-4 border-gray-800 p-4 md:p-8">
        <div class="flex items-center justify-between mb-6">
          <h1 class="text-2xl md:text-3xl font-bold">RIWAYAT TRANSAKSI</h1>
          <button
            class="p-2 border-4 border-gray-800 hover:bg-gray-100 active:bg-gray-200"
          >
            filter
          </button>
        </div>

        
          <div class="border-4 border-gray-800 p-4 mb-6 bg-gray-50">
            <div class="flex items-center justify-between mb-4">
              <div class="flex items-center gap-2">
                <Calendar size={20} />
                <span class="font-bold">FILTER BERDASARKAN TANGGAL</span>
              </div>
              
                <button
                  class="flex items-center gap-1 text-sm border-2 border-gray-800 px-2 py-1 hover:bg-gray-200"
                >
                  <X size={16} />
                  <span>Clear</span>
                </button>
              
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
              <div>
                <label class="block text-sm font-bold mb-2">DARI TANGGAL</label>
                <input
                  type="date"
                  class="w-full border-4 border-gray-800 p-2 focus:outline-none focus:ring-4 focus:ring-gray-400"
                />
              </div>
              <div>
                <label class="block text-sm font-bold mb-2">SAMPAI TANGGAL</label>
                <input
                  type="date"
                  class="w-full border-4 border-gray-800 p-2 focus:outline-none focus:ring-4 focus:ring-gray-400"
                />
              </div>
            </div>
          </div>

        <div class="mb-4">
          <p class="text-sm text-gray-600">
            menampilkan {filteredTransactions.length} dari {transactions.length} transaksi
          </p>
        </div>

        <div class="border-4 border-gray-800 mb-6 max-h-[500px] overflow-y-auto">
          @if ($total_data == 0)
            <div class="p-8 text-center text-gray-500">
              <p class="font-bold mb-2">RIWAYAT KOSONG</p>
            </div>
          @endif
            <div class="divide-y-4 divide-gray-800">
              @foreach($transaksi as $t)
                <div key={transaction.id} class="p-4 hover:bg-gray-50">
                  <div class="flex justify-between items-start mb-2">
                    <div class="flex-1">
                      <p class="font-bold text-lg">{{ "Deskripsi" }}</p>
                      <p class="text-sm text-gray-600">
                        {{ $t->dibuat_pada }}
                      </p>
                    </div>
                    <div class="text-right">
                        <p class="font-bold text-lg {{ $t->jenis === 'debit' ? 'text-red-600' : 'text-green-600' }}">
                            {{ $t->jenis === 'debit' ? '-' : '+' }}
                            Rp {{ number_format(abs($t->saldo_akhir - $t->saldo_awal), 0, ',', '.') }}
                        </p>
                        <p class="text-xs text-gray-500">
                            Saldo: Rp {{ $t->saldo_akhir }}
                        </p>
                    </div>
                  </div>
                </div>
            @endforeach
            </div>
        </div>

        <button
          class="w-full bg-gray-800 text-white p-4 text-xl font-bold hover:bg-gray-700 active:bg-gray-900 flex items-center justify-center gap-2"
        >
          <ArrowLeft size={24} />
          <span>Logout</span>
        </button>
      </div>
    </div>