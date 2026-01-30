<div>
     <button
          wire:click="logout"
          class="w-full bg-gray-800 text-white p-4 text-xl font-bold hover:bg-gray-700 active:bg-gray-900"
        >
          Logout
    </button>
    @switch($langkah)
        @case("top-up")
            <div class="flex flex-col items-center justify-center min-h-screen bg-gray-50 p-8">
            <div class="w-full max-w-md bg-white border-4 border-gray-800 p-8">
                <div class="flex items-center justify-center mb-8">
                <div class="w-16 h-16 border-4 border-gray-800 flex items-center justify-center">
                    <CreditCard size={32} />
                </div>
                </div>
                
                <h1 class="text-3xl font-bold text-center mb-2">TOP UP KARTU</h1>
                <p class="text-center text-gray-600 mb-8">Masukan total top-up</p>

                <div class="border-4 border-gray-800 p-6 mb-6 bg-gray-50">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-12 h-12 border-4 border-gray-800 flex items-center justify-center bg-white">
                        <User size={24} />
                        </div>
                        <div>
                        <p class="font-bold text-lg">{{ $kartuModel->siswaRelation->nama }}</p>
                        <p class="text-sm text-gray-600">NIS {{ $kartuModel->siswaRelation->nis }}</p>
                        </div>
                    </div>
                
                    <div class="border-t-4 border-gray-300 pt-4">
                        <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <Wallet size={20} />
                            <span class="font-bold">SALDO TERSEDIA:</span>
                        </div>
                        <span class="text-2xl font-bold">Rp {{ $kartuModel->saldo }}</span>
                        </div>
                    </div>
                </div>

                {/* Top-up Form */}
                <form wire:submit="processTopUp">
                    <div class="mb-4">
                        <label class="block text-sm font-bold mb-2">TOTAL TOP-UP (Rp)</label>
                        <input
                            
                            type="number"
                            wire:model.live="jumlah"
                            class="w-full border-4 border-gray-800 p-4 text-2xl text-center focus:outline-none focus:ring-4 focus:ring-gray-400"
                            placeholder="0"
                            required
                            autoFocus
                        />
                    </div>

                {/* Quick Amount Buttons */}
                    <div class="mb-6">
                        <p class="text-sm font-bold mb-2">PINTASAN:</p>
                        <div class="grid grid-cols-4 gap-2">
                            @foreach($pintasan as $p)
                                <button
                                wire:click="add({{ $p }})"
                                type="button"
                                class="border-4 border-gray-800 p-2 text-sm font-bold hover:bg-gray-800 hover:text-white active:bg-gray-900"
                                >
                                Rp {{ $p }}
                                </button>
                            @endforeach
                        </div>
                    </div>

                
                    <div class="border-4 border-blue-600 p-4 mb-6 bg-blue-50">
                    <div class="flex justify-between items-center mb-2">
                        <span class="font-bold">SALDO BARU:</span>
                        <span class="text-xl font-bold text-blue-600">
                        Rp {{$kartuModel->saldo + $jumlah}}
                        </span>
                    </div>
                    </div>
                
                
                    <button
                        type="submit"
                        class="w-full bg-gray-800 text-white p-4 text-xl font-bold hover:bg-gray-700 active:bg-gray-900"
                    >
                        KONFIRMASI TOP UP
                    </button>
                </form>
                </div>
            </div>
        @break
        @case("scan")
            <div class="flex flex-col items-center justify-center min-h-screen bg-gray-50 p-8">
                <div class="w-full max-w-md bg-white border-4 border-gray-800 p-8">
                    <h1 class="text-3xl font-bold text-center mb-2">TOP UP KARTU</h1>
                    <p class="text-center text-gray-600 mb-8" id="status">Tap kartu Untuk Melanjutakan</p>
                    @error("kartu")
                     <div class="bg-red-100 border-4 border-red-500 p-4 mb-6">
                            <p class="text-red-700 font-bold text-center">{{ $message }}</p>
                      </div>
                    @enderror
                    <div class="border-4 border-dashed border-gray-400 p-12 mb-8 bg-gray-50" id="scanBtn">
                      <div class="flex flex-col items-center">
                        <div class="w-24 h-24 border-4 border-gray-800 flex items-center justify-center mb-4 animate-pulse">
                        </div>
                        <p class="text-xl font-bold text-center">TAP DI SINI</p>
                      </div>
                    </div>
                    <pre id="output">Waiting for NFC data...</pre>
                    <button
                      wire:click="process"
                      class="w-full bg-gray-800 text-white p-4 text-xl font-bold hover:bg-gray-700 active:bg-gray-900"
                    >
                      Proses
                    </button>
                </div>
            </div>
        @break
        @case("pin")
            <livewire:siswa.pin-component :kartuModel="$kartuModel" jenis="top-up"/>
        @break
    @endswitch
</div>
@script
<script>
    const scanBtn = document.getElementById('scanBtn');
    const output = document.getElementById('output');
    const status = document.getElementById('status');

    scanBtn.addEventListener('click', async () => {
        

        try {
            if (!('NDEFReader' in window)) {
                $wire.nomorKartu = '2920743651'
                status.textContent = '❌ Web NFC is not supported on this device/browser.';
                return;
            }
            const ndef = new NDEFReader();
            await ndef.scan();

            status.textContent = '📡 Scanning... Tap an NFC card.';
            scanBtn.disabled = true;

            ndef.onreading = event => {
                const { serialNumber, message } = event;

                let records = [];

                for (const record of message.records) {
                    records.push({
                        recordType: record.recordType,
                        mediaType: record.mediaType,
                        data: new TextDecoder().decode(record.data)
                    });
                }

                const result = {
                    serialNumber,
                    records
                };

                $wire.nomorKartu = records[0].data

                output.textContent = JSON.stringify(result, null, 2);
                status.textContent = '✅ NFC card read successfully';
                scanBtn.disabled = false;
            };

            ndef.onreadingerror = () => {
                status.textContent = '⚠️ Error reading NFC card';
                scanBtn.disabled = false;
            };

        } catch (error) {
            console.error(error);
            status.textContent = '❌ NFC scan failed or permission denied';
            scanBtn.disabled = false;
        }
    });
</script>
@endscript