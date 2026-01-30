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
    @endswitch
</div>


