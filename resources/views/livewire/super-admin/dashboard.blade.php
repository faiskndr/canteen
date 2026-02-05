<div class="flex flex-col min-h-screen bg-gradient-to-br from-gray-50 to-blue-50 p-8">
    <div class="w-full max-w-4xl mx-auto">
        <div class="bg-white border-4 border-gray-800 p-8 mb-6">
            <div class="flex items-center justify-between mb-4">
                <h1 class="text-3xl font-bold text-gray-900">
                    DASHBOARD SUPER ADMIN
                </h1>

                <button
                    wire:click="logout"
                    class="flex items-center gap-2 border-4 border-gray-800 px-4 py-2 font-bold hover:bg-gray-100"
                >
                    {{-- Icon --}}
                    
                    LOGOUT
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <button
                wire:click="selectSchools"
                class="bg-white border-4 border-gray-800 p-8 hover:bg-gray-50 active:bg-gray-100"
            >
                <div class="flex items-center gap-4 mb-4">
                    <div class="w-16 h-16 border-4 border-gray-800 bg-gray-100 flex items-center justify-center">
                        
                    </div>
                    <div class="text-left">
                        <h2 class="text-2xl font-bold">MANAJEMEN SEKOLAH</h2>
                        <p class="text-sm text-gray-600">Kelola data sekolah</p>
                    </div>
                </div>
            </button>

            <button
                wire:click="selectSchoolAdmins"
                class="bg-white border-4 border-gray-800 p-8 hover:bg-gray-50 active:bg-gray-100"
            >
                <div class="flex items-center gap-4 mb-4">
                    <div class="w-16 h-16 border-4 border-gray-800 bg-gray-100 flex items-center justify-center">
                        
                    </div>
                    <div class="text-left">
                        <h2 class="text-2xl font-bold">ADMIN SEKOLAH</h2>
                        <p class="text-sm text-gray-600">Kelola admin sekolah</p>
                    </div>
                </div>
            </button>

            <button
                wire:click="selectMaintenance"
                class="bg-white border-4 border-gray-800 p-8 hover:bg-gray-50 active:bg-gray-100"
            >
                <div class="flex items-center gap-4 mb-4">
                    <div class="w-16 h-16 border-4 border-gray-800 bg-gray-100 flex items-center justify-center">
                        
                    </div>
                    <div class="text-left">
                        <h2 class="text-2xl font-bold">MODE PERAWATAN</h2>
                        <p class="text-sm text-gray-600">
                            Jadwalkan downtime & notifikasi sekolah
                        </p>
                    </div>
                </div>
            </button>

            <button
                wire:click="selectBackup"
                class="bg-white border-4 border-gray-800 p-8 hover:bg-gray-50 active:bg-gray-100"
            >
                <div class="flex items-center gap-4 mb-4">
                    <div class="w-16 h-16 border-4 border-gray-800 bg-gray-100 flex items-center justify-center">
                        
                    </div>
                    <div class="text-left">
                        <h2 class="text-2xl font-bold">BACKUP & RESTORE</h2>
                        <p class="text-sm text-gray-600">Manajemen database</p>
                    </div>
                </div>
            </button>

        </div>
    </div>
</div>
