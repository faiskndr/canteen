<div class="flex flex-col items-center justify-center min-h-screen bg-gray-50 p-8">
    <div class="w-full max-w-md bg-white border-4 border-green-600 p-8">
        
        {{-- Success Icon --}}
        <div class="flex items-center justify-center mb-8">
            <div class="w-24 h-24 border-4 border-green-600 rounded-full flex items-center justify-center bg-green-50">
                <!-- Heroicon: Check Circle -->
                <svg xmlns="http://www.w3.org/2000/svg" 
                     class="h-16 w-16 text-green-600" 
                     fill="none" 
                     viewBox="0 0 24 24" 
                     stroke="currentColor" 
                     stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
        </div>

        <h1 class="text-3xl font-bold text-center mb-4 text-green-600">
            PIN DIGANTI!
        </h1>

        <div class="border-4 border-gray-800 p-8 mb-8 bg-gray-50">
            
            {{-- Lock Section --}}
            <div class="flex flex-col items-center mb-6">
                <div class="w-16 h-16 border-4 border-green-600 rounded-full flex items-center justify-center bg-white mb-4">
                    <!-- Heroicon: Lock Closed -->
                    <svg xmlns="http://www.w3.org/2000/svg" 
                         class="h-8 w-8 text-green-600" 
                         fill="none" 
                         viewBox="0 0 24 24" 
                         stroke="currentColor" 
                         stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M12 11c1.657 0 3 .895 3 2v3a3 3 0 11-6 0v-3c0-1.105 1.343-2 3-2z" />
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M7 11V7a5 5 0 0110 0v4" />
                    </svg>
                </div>

                <p class="text-center font-bold text-lg">
                    PIN ANDA TELAH BERHASIL DIGANTI
                </p>
            </div>

            {{-- Warning --}}
            <div class="border-t-4 border-gray-300 pt-6">
                <div class="bg-yellow-50 border-4 border-yellow-500 p-4">
                    <p class="text-yellow-800 text-sm font-bold mb-2">
                        ⚠ PENTING
                    </p>
                    <p class="text-yellow-700 text-sm">
                        Harap ingat PIN baru Anda. Anda akan membutuhkannya untuk semua transaksi di masa depan.
                    </p>
                </div>
            </div>

            {{-- Timestamp --}}
            <div class="mt-6 pt-6 border-t-4 border-gray-300">
                <p class="text-xs text-gray-500 text-center">
                    PIN diganti pada {{ now()->format('d M Y H:i:s') }}
                </p>
            </div>
        </div>

        {{-- Logout Button --}}
            <button
                wire:click="logout"
                class="w-full bg-gray-800 text-white p-4 text-xl font-bold hover:bg-gray-700 active:bg-gray-900">
                Logout
            </button>

    </div>
</div>
