<div>
    <div class="flex flex-col items-center justify-center min-h-screen bg-gray-50 p-8">
        <div class="w-full max-w-md bg-white border-4 border-gray-800 p-8">
            <h1 class="text-3xl font-bold text-center mb-2">CANTEEN SYSTEM</h1>
            <p class="text-center text-gray-600 mb-8">Pilih Menu</p>
        
            <div class="space-y-4">
            
            <button
                onClick={onSelectBalanceCheck}
                class="w-full bg-white border-4 border-gray-800 text-gray-800 p-6 text-xl font-bold hover:bg-gray-100 active:bg-gray-200 flex items-center justify-center gap-4"
            >
                <div class="w-12 h-12 border-4 border-gray-800 flex items-center justify-center">
                <Wallet size={24} />
                </div>
                <span>CHECK BALANCE</span>
            </button>

            <button
                onClick={onSelectHistory}
                class="w-full bg-white border-4 border-gray-800 text-gray-800 p-6 text-xl font-bold hover:bg-gray-100 active:bg-gray-200 flex items-center justify-center gap-4"
            >
                <div class="w-12 h-12 border-4 border-gray-800 flex items-center justify-center">
                <History size={24} />
                </div>
                <span>TRANSACTION HISTORY</span>
            </button>

            <button
                onClick={onSelectResetPin}
                class="w-full bg-white border-4 border-orange-600 text-orange-600 p-6 text-xl font-bold hover:bg-orange-50 active:bg-orange-100 flex items-center justify-center gap-4"
            >
                <div class="w-12 h-12 border-4 border-orange-600 flex items-center justify-center">
                <KeyRound size={24} />
                </div>
                <span>RESET PIN</span>
            </button>

        

            </div>
        </div>
    </div>
</div>
