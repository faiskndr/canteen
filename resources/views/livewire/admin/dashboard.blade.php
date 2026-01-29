<div>
      <div class="flex flex-col min-h-screen bg-gray-50 p-8">
      <div class="w-full max-w-4xl mx-auto">
        <div class="bg-white border-4 border-gray-800 p-8 mb-6">
          <div class="flex items-center justify-between mb-4">
            <h1 class="text-3xl font-bold">DASHBOARD ADMIN</h1>
            <button
              wire:click="logout"
              class="flex items-center gap-2 border-4 border-gray-800 px-4 py-2 font-bold hover:bg-gray-100"
            >
              <LogOut size={20} />
              LOGOUT
            </button>
          </div>
          <p class="text-gray-600">Smart Canteen</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <button
            class="bg-white border-4 border-gray-800 p-8 hover:bg-gray-100 active:bg-gray-200"
          >
            <div class="flex items-center gap-4 mb-4">
              <div class="w-16 h-16 border-4 border-gray-800 flex items-center justify-center">
                <Users size={32} />
              </div>
              <div class="text-left">
                <h2 class="text-2xl font-bold">DATA SISWA</h2>
                <p class="text-sm text-gray-600">Kelola Data Siswa</p>
              </div>
            </div>
          </button>

          <button
            class="bg-white border-4 border-gray-800 p-8 hover:bg-gray-100 active:bg-gray-200"
          >
            <div class="flex items-center gap-4 mb-4">
              <div class="w-16 h-16 border-4 border-gray-800 flex items-center justify-center">
                <UserCog size={32} />
              </div>
              <div class="text-left">
                <h2 class="text-2xl font-bold">DATA PETUGAS</h2>
                <p class="text-sm text-gray-600">Kelola Akun Petugas</p>
              </div>
            </div>
          </button>


          <button
            class="bg-white border-4 border-gray-800 p-8 hover:bg-gray-100 active:bg-gray-200"
          >
            <div class="flex items-center gap-4 mb-4">
              <div class="w-16 h-16 border-4 border-gray-800 flex items-center justify-center">
                <UserCog size={32} />
              </div>
              <div class="text-left">
                <h2 class="text-2xl font-bold">DATA KANTIN</h2>
                <p class="text-sm text-gray-600">Kelola Kantin</p>
              </div>
            </div>
          </button>

          <button
            class="bg-white border-4 border-gray-800 p-8 hover:bg-gray-100 active:bg-gray-200"
          >
            <div class="flex items-center gap-4 mb-4">
              <div class="w-16 h-16 border-4 border-gray-800 flex items-center justify-center">
                <Receipt size={32} />
              </div>
              <div class="text-left">
                <h2 class="text-2xl font-bold">TRANSAKSI</h2>
                <p class="text-sm text-gray-600">Lihat & Export Transaksi</p>
              </div>
            </div>
          </button>

          <button
            class="bg-white border-4 border-gray-800 p-8 hover:bg-gray-100 active:bg-gray-200"
          >
            <div class="flex items-center gap-4 mb-4">
              <div class="w-16 h-16 border-4 border-gray-800 flex items-center justify-center">
                <CreditCard size={32} />
              </div>
              <div class="text-left">
                <h2 class="text-2xl font-bold">MANAJEMEN KARTU</h2>
                <p class="text-sm text-gray-600">Aktivasi/Blokir Kartu</p>
              </div>
            </div>
          </button>
        </div>
      </div>
    </div>
</div>