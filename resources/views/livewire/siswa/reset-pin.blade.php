<div>
  @if($berhasilRubahPin)
    <livewire:siswa.reset-pin-success />
  @else
  <div class="flex flex-col items-center justify-center min-h-screen bg-gray-50 p-8">
      <div class="w-full max-w-md bg-white border-4 border-gray-800 p-8">
        <div class="flex items-center justify-center mb-8">
          <div class="w-16 h-16 border-4 border-gray-800 flex items-center justify-center">
            <Lock size={32} />
          </div>
        </div>
        
        <h1 class="text-3xl font-bold text-center mb-2">GANTI PIN</h1>
        <p class="text-center text-gray-600 mb-8">Masukan 4-digit PIN Baru</p>

        <form wire:submit="submit">
          <div class="mb-8">
            <label class="block text-sm font-bold mb-3">PIN BARU</label>
            <div class="flex justify-center">
                <livewire:siswa.input-pin-component :key="$pinKey" :kartuModel="$kartuModel" :length="4" :jenis="$jenis" :isShowSubmit="false"/>
            </div>
          </div>

          <div class="mb-8">
            <label class="block text-sm font-bold mb-3">KONFIRMASI PIN BARU</label>
            <div class="flex justify-center">
                <livewire:siswa.input-pin-component :key="$confirmPinKey" :kartuModel="$kartuModel" :length="4" :jenis="$jenis" :isShowSubmit="false"/>
            </div>
          </div>
          @error("pin")
          <div class="bg-red-100 border-4 border-red-500 p-4 mb-6">
                <p class="text-red-700 font-bold text-center">{{ $message }}</p>
          </div>
          @enderror
          @if($isPinMatch)
            <div class="border-4 border-green-600 p-4 mb-6 bg-green-50">
              <p class="text-green-700 font-bold text-center">✓ PIN Sama!</p>
            </div>
          @endif
          <button
            type="submit"
            class="w-full bg-gray-800 text-white p-4 text-xl font-bold hover:bg-gray-700 active:bg-gray-900 disabled:bg-gray-400 disabled:cursor-not-allowed"
          >
            KONFIRMASI PERUBAHAN
          </button>
        </form>
      </div>
    </div>
    @endif
</div>
