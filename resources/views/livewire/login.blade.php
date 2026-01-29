<div>
     <div class="flex flex-col items-center justify-center min-h-screen bg-gray-50 p-8">
      <div class="w-full max-w-md bg-white border-4 border-gray-800 p-8">
        <div class="flex items-center justify-center mb-8">
          <div class="w-20 h-20 border-4 border-gray-800 flex items-center justify-center">
            <Lock size={40} />
          </div>
        </div>
        
        <h1 class="text-3xl font-bold text-center mb-2">LOGIN</h1>
        <p class="text-center text-gray-600 mb-8">Masukan kredensial</p>
        
        @error('loginForm.auth')
            <div class="bg-red-100 border-4 border-red-500 p-4 mb-6">
                <p class="text-red-700 font-bold text-center">INVALID CREDENTIALS</p>
            </div>
        @enderror
        @error('loginForm.username') <span class="error">{{ $message }}</span> @enderror
        @error('loginForm.password') <span class="error">{{ $message }}</span> @enderror

        <form wire:submit="login" class="space-y-4">
          <div>
            <label class="block text-sm font-bold mb-2">USERNAME</label>
            <div class="flex items-center border-4 border-gray-800">
              <div class="p-3 bg-gray-100 border-r-4 border-gray-800">
                <User size={20} />
              </div>
              <input
                type="text"
                wire:model="loginForm.username"
                class="flex-1 p-3 focus:outline-none"
                placeholder="username"
                required
              />
            </div>
          </div>

          <div>
            <label class="block text-sm font-bold mb-2">PASSWORD</label>
            <div class="flex items-center border-4 border-gray-800">
              <div class="p-3 bg-gray-100 border-r-4 border-gray-800">
                <Lock size={20} />
              </div>
              <input
                type="password"
                wire:model="loginForm.password"
                class="flex-1 p-3 focus:outline-none"
                placeholder="••••••••"
                required
              />
            </div>
          </div>

          <button
            type="submit"
            class="w-full bg-gray-800 text-white p-4 text-xl font-bold hover:bg-gray-700 active:bg-gray-900 mt-6"
          >
            LOGIN
          </button>
        </form>

        <!-- <div class="mt-6 p-4 bg-gray-100 border-4 border-gray-300">
          <p class="text-xs text-gray-600 text-center font-bold">
            HINT: admin / admin123
          </p>
        </div> -->
      </div>
    </div>
</div>
