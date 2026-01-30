<div>
    <button
          wire:click="logout"
          class="w-full bg-gray-800 text-white p-4 text-xl font-bold hover:bg-gray-700 active:bg-gray-900"
        >
          Logout
    </button>
    @switch($langkah)
        @case("input")
            <div class="flex flex-col items-center justify-center min-h-screen bg-gray-50 p-8">
                <div class="w-full max-w-md bg-white border-4 border-gray-800 p-8">
                  <div class="flex items-center justify-center mb-8">
                    <div class="w-16 h-16 border-4 border-gray-800 flex items-center justify-center">
                      SC
                    </div>
                  </div>

                  <h1 class="text-3xl font-bold text-center mb-2">
                    PETUGAS KANTIN
                  </h1>
                  <p class="text-center text-gray-600 mb-8">
                    Masukan Jumlah Transaksi
                  </p>

                  <!-- <form> -->
                    <div class="mb-6">
                      <label class="block text-sm font-bold mb-2">
                        Total Rp
                      </label>
                      <input
                        type="number"
                        wire:model.live="jumlah"
                        class="w-full border-4 border-gray-800 p-4 text-2xl text-center focus:outline-none focus:ring-4 focus:ring-gray-400"
                        placeholder="0"
                        required
                        autoFocus
                      />
                    </div>

                    <button
                      wire:click="handlePembayaranStep('scan')"
                      class="w-full bg-gray-800 text-white p-4 text-xl font-bold hover:bg-gray-700 active:bg-gray-900"
                    >
                      Proses
                    </button>
                  <!-- </form> -->
                </div>
            </div>
        @break
        @case("scan")
            <livewire:scan-component />
        @break
        @case("pin")
            <livewire:siswa.pin-component :kartuModel="$kartuModel" jenis="payment"/>
        @break
        case("status")
        <h1>Hello</h1>
              <div class="flex flex-col items-center justify-center min-h-screen bg-gray-50 p-8">
                  <div class="w-full max-w-md bg-white border-4 border-green-600 p-8">
                    <div class="flex items-center justify-center mb-8">
                      <div class="w-24 h-24 border-4 border-green-600 rounded-full flex items-center justify-center bg-green-50">
                        <CheckCircle size={64} class="text-green-600" />
                      </div>
                    </div>

                    <h1 class="text-3xl font-bold text-center mb-4 text-green-600">BERHASIL!</h1>
                    <div class="border-4 border-gray-800 p-6 mb-8 bg-gray-50">
                      <div class="mb-4 pb-4 border-b-4 border-gray-300">
                        <p class="text-sm text-gray-600 mb-1">Nama Siswa</p>
                        <p class="font-bold text-lg">{{ $kartuModel->siswaRelation->nama }}</p>
                      </div>

                      <div class="mb-4 pb-4 border-b-4 border-gray-300">
                        <p class="text-sm text-gray-600 mb-1">Total Transaksi</p>
                        <p class="text-3xl font-bold">Rp {{ $jumlah }}</p>
                      </div>

                      <div class="mb-4 pb-4 border-b-4 border-gray-300">
                        <div class="flex justify-between items-center">
                          <span class="text-sm text-gray-600">Saldo Lama:</span>
                          <span class="font-bold">Rp {{$saldoLama}}</span>
                        </div>
                      </div>

                      <div class="flex items-center justify-between p-4 border-4">
                        <div class="flex items-center gap-2">
                          <Wallet size={20} />
                          <span class="font-bold">Saldo Baru:</span>
                        </div>
                        <span class="text-2xl font-bold">Rp {{ $saldoLama - $jumlah }}</span>
                      </div>

                      <div class="mt-4 pt-4 border-t-4 border-gray-300">
                        <p class="text-xs text-gray-500 text-center">
                          Transaksi selesai pada {new Date().toLocaleString()}
                        </p>
                      </div>
                    </div>

                    <button
                      class="w-full bg-gray-800 text-white p-4 text-xl font-bold hover:bg-gray-700 active:bg-gray-900 mb-4"
                    >
                      Cetak Struk
                    </button>

                    <button
                      onClick={onReset}
                      class="w-full bg-gray-800 text-white p-4 text-xl font-bold hover:bg-gray-700 active:bg-gray-900"
                    >
                      Transaksi Baru
                    </button>
                  </div>
              </div>
        @break
    @endswitch
</div>


