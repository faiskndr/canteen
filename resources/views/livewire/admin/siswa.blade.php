
<div
    x-data="{open:  @entangle('isShowForm')}" 
>

    <div
        x-show="open"
        x-transition.opacity
        class="fixed inset-0 z-40 bg-black/50"
        @click="open = false"
        @keydown.escape.window="open = false"
    ></div>
    
    <div 
        x-show="open"
        x-transition
        @click.self="open = false"
        class="fixed inset-0 z-50 flex items-center justify-center px-4">
        <div class="w-full max-w-2xl mx-auto">
          <div class="bg-white border-4 border-gray-800 p-8">
            <h1 class="text-3xl font-bold mb-2">
              @if($isEdit)
              Ubah
              @else
              Tambah 
              @endif
              Siswa
            </h1>
            <p class="text-gray-600 mb-6">Isi data siswa</p>    
            <form wire:submit="save" class="space-y-4">
              <div>
                <label class="block text-sm font-bold mb-2">NIS *</label>
                <input
                  type="text"
                  wire:model="siswaForm.nis"
                  class="w-full border-4 border-gray-800 p-3 focus:outline-none focus:ring-4 focus:ring-gray-400"
                  placeholder="NIS"
                  required
                />
              </div>    
              <div>
                <label class="block text-sm font-bold mb-2">NAMA *</label>
                <input
                  type="text"
                  wire:model="siswaForm.nama"
                  class="w-full border-4 border-gray-800 p-3 focus:outline-none focus:ring-4 focus:ring-gray-400"
                  placeholder="Nama Lengkap"
                  required
                />
              </div>    
              <div>
                <label class="block text-sm font-bold mb-2">KELAS *</label>
                <input
                  type="text"
                  wire:model="siswaForm.kelas"
                  class="w-full border-4 border-gray-800 p-3 focus:outline-none focus:ring-4 focus:ring-gray-400"
                  placeholder="10-A"
                  required
                />
              </div>    
               <div>
                <label class="block text-sm font-bold mb-2">NOMOR KARTU *</label>
                <input
                  type="text"
                  wire:model="siswaForm.nomor_kartu"
                  class="w-full border-4 border-gray-800 p-3 focus:outline-none focus:ring-4 focus:ring-gray-400"
                  placeholder="1003204211"
                  required
                  disabled="{{ $isEdit }}"
                />
              </div>    
              <div>
                <label class="block text-sm font-bold mb-2">FOTO</label>
                <input
                  type="file"
                  wire:model="siswaForm.foto"
                  class="w-full border-4 border-gray-800 p-3 focus:outline-none focus:ring-4 focus:ring-gray-400"
                  placeholder="https://example.com/photo.jpg (optional)"
                />
              </div>    
              <div class="flex gap-4 pt-4">
                <button
                  type="submit"
                  class="flex-1 bg-gray-800 text-white p-4 text-xl font-bold hover:bg-gray-700 active:bg-gray-900"
                >
                  @if($isEdit)
                    Ubah
                  @else
                    Tambah 
                  @endif
                  Siswa
                </button>
                <button
                  type="button"
                  wire:click="close"
                  class="flex-1 border-4 border-gray-800 p-4 text-xl font-bold hover:bg-gray-100 active:bg-gray-200"
                >
                  BATAL
                </button>
              </div>
            </form>
          </div>
        </div>
    </div>

    <div class="flex flex-col min-h-screen bg-gray-50 p-8">
        <div class="w-full max-w-6xl mx-auto">
        <div class="bg-white border-4 border-gray-800 p-8 mb-6">
            <div class="flex items-center justify-between mb-4">
            <div>
                <h1 class="text-3xl font-bold">MANAJEMEN SISWA</h1>
                <p class="text-gray-600">Total: {{$total_siswa}} siswa</p>
            </div>
            <div class="flex gap-4">
                <button
                    wire:click="open"
                    class="flex items-center gap-2 bg-gray-800 text-white px-6 py-3 font-bold hover:bg-gray-700"
                >
                <Plus size={20} />
                TAMBAH SISWA
                </button>
                <button
                  wire:click="goToDashboard"
                  class="flex items-center gap-2 border-4 border-gray-800 px-6 py-3 font-bold hover:bg-gray-100"
                >
                <ArrowLeft size={20} />
                KEMBALI
                </button>
            </div>
            </div>
            <div class="flex items-center border-4 border-gray-800 mt-4">
              <div class="p-3 bg-gray-100 border-r-4 border-gray-800">
                  <Search size={20} />
              </div>
              <input
                  type="text"
                  class="flex-1 p-3 focus:outline-none"
                  placeholder="Cari Berdasarkan NIS, nama, atau kelas..."
              />
            </div>
        </div>
        <div class="space-y-4">
            
            @forelse ($siswa as $s)
                <div key={student.id} class="bg-white border-4 border-gray-800 p-6">
                <div class="flex items-center gap-4">
                    <div class="w-16 h-16 border-4 border-gray-800 flex items-center justify-center bg-gray-100 flex-shrink-0">
                        @if(!is_null($s->foto))
                            <img src="{{ $s->foto }}" alt="{{ $s->nama }}" class="w-full h-full object-cover" />
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                            </svg>
                        @endif
                    </div>
                    <div class="flex-1">
                    <h3 class="font-bold text-xl">{{ $s->nama }}</h3>
                    <p class="text-sm text-gray-600">NIS: {{ $s->nis }}</p>
                    <p class="text-sm text-gray-600">Kelas: {{ $s->kelas }}</p>
                    </div>
                    <div class="flex gap-2">
                    <button
                        wire:click="open({{ $s->siswa_id }})"
                        class="border-2 border-gray-800 p-2 hover:bg-gray-100"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                        </svg>
                    </button>
                    <button
                        wire:click="delete({{ $s->siswa_id }})"
                        class="border-2 border-red-500 p-2 hover:bg-red-50"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 text-red-600">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                        </svg>
                    </button>
                    </div>
                </div>
                </div>
            @empty
                <div class="bg-white border-4 border-gray-800 p-12 text-center">
                    <p class="text-gray-500 font-bold">SISWA TIDAK DITEMUKAN</p>
                </div>
            @endforelse
        </div>
        </div>
    </div>
</div>
