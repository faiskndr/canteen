<div>
  @switch ($langkah)
    @case("scan")
    <div class="flex flex-col items-center justify-center min-h-screen bg-gray-50 p-8">
      <div class="w-full max-w-md bg-white border-4 border-gray-800 p-8">
        <h1 class="text-3xl font-bold text-center mb-2">CEK SALDO</h1>
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
        <!-- <pre id="output">Waiting for NFC data...</pre> -->
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
      <livewire:siswa.pin-component :kartuModel="$kartuModel"/>
    @break
    @case("menu")
      <livewire:siswa.kartu-menu-component />
    @break
    @case("saldo")
      <livewire:siswa.saldo-component :kartuModel="$kartuModel"/>
    @break
    @case("riwayat-transaksi")
      <livewire:siswa.riwayat-transaksi/>
    @break
    @case("reset-pin")
      <livewire:siswa.reset-pin :kartuModel="$kartuModel"/>
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