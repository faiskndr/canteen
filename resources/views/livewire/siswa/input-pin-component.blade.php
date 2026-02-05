<div>
<div
    class="flex items-center gap-2"
    x-data="{
        focus(index) {
            $refs[`input${index}`]?.focus()
        }
    }"
>
    <div class="flex items-center gap-1">
        @for ($i = 0; $i < $length; $i++)
            <div
                class="
                    relative flex h-9 w-9 items-center justify-center
                    border border-input bg-input-background text-sm
                    transition-all
                    rounded-md
                    focus-within:ring-2 focus-within:ring-ring
                "
            >
        
                <input
                    type="password"
                    inputmode="numeric"
                    maxlength="1"
                    class="absolute inset-0 h-full w-full text-center bg-transparent outline-none caret-transparent"
                    x-ref="input{{ $i }}"
                    value="{{ $value[$i] ?? '' }}"
                        @input="
                            $wire.setChar({{ $i }}, $event.target.value);
                            if ($event.target.value){
                                focus({{ $i + 1 }});
                            }
    "
                    @keydown.backspace="
                        if (!$event.target.value) {
                            $wire.setChar({{ $i }}, '');
                            focus({{ $i - 1 }});
                        }
                    "
                />
                {{-- Fake caret --}}
                @if (sizeof($value) === $i)
                    <div class="pointer-events-none absolute inset-0 flex items-center justify-center">
                        <div class="h-4 w-px bg-foreground animate-pulse"></div>
                    </div>
                @endif
            </div>

            {{-- Optional separator --}}
            @if ($i === 4)
                <div role="separator" class="mx-1 text-muted-foreground">
                    &minus;
                </div>
            @endif
        @endfor
    </div>
</div>
    @if($isShowSubmit)
        <button
              wire:click="submit"
              class="w-full mt-4 bg-gray-800 text-white p-4 text-xl font-bold hover:bg-gray-700 active:bg-gray-900"
            >
              Proses
        </button>
    @endif
</div>