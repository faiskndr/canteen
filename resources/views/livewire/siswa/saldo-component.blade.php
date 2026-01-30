<div>
    <div class="flex flex-col items-center justify-center min-h-screen bg-gray-50 p-8">
      <div class="w-full max-w-md bg-white border-4 border-blue-600 p-8">
        <div class="flex items-center justify-center mb-8">
          <div class="w-24 h-24 border-4 border-blue-600 rounded-full flex items-center justify-center bg-blue-50">
            <Wallet size={64} class="text-blue-600" />
          </div>
        </div>
        
        <h1 class="text-3xl font-bold text-center mb-4 text-blue-600">Saldo</h1>
        
        <div class="border-4 border-gray-800 p-8 mb-8 bg-gray-50">
          <p class="text-center text-sm text-gray-600 mb-2">Saldo Tersedia</p>
          <p class="text-5xl font-bold text-center">Rp {{ $kartuModel->saldo }}</p>
          
          <div class="border-t-4 border-gray-300 mt-6 pt-6">
            <p class="text-xs text-gray-500 text-center">
              Terkahir dilihat: {{ $terakhir_dilihat }}
            </p>
          </div>
        </div>
        
        <button
          wire:click="backToMenu"
          class="w-full bg-gray-800 text-white p-4 text-xl font-bold hover:bg-gray-700 active:bg-gray-900 flex items-center justify-center gap-2"
        >
          <ArrowLeft size={24} />
          <span>Kembali</span>
        </button>
      </div>
    </div>
</div>
