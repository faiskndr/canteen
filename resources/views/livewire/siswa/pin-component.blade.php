<div>
    <div class="flex flex-col items-center justify-center min-h-screen bg-gray-50 p-8">
      <div class="w-full max-w-md bg-white border-4 border-gray-800 p-8">
        <div class="flex items-center justify-center mb-8">
          <div class="w-16 h-16 border-4 border-gray-800 flex items-center justify-center">
            <Lock size={32} />
          </div>
        </div>
        
        <h1 class="text-3xl font-bold text-center mb-2">Masukan PIN</h1>
        
          <!-- <div class="bg-red-100 border-4 border-red-500 p-4 mb-6">
            <p class="text-red-700 font-bold text-center">INVALID PIN</p>
            <p class="text-red-600 text-sm text-center">Please try again</p>
          </div> -->
        
        <div class="flex justify-center mb-8">
            <livewire:siswa.input-pin-component :kartuModel="$kartuModel" :length="4" :jenis="$jenis"/>
        </div>
      </div>
    </div>
</div>