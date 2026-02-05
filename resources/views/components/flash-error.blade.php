<div
    x-data="{ show: false, message: '' }"
    x-on:flash-error.window="
        message = $event.detail.message;
        show = true;
        setTimeout(() => show = false, 4000)
    "
    x-show="show"
    x-transition
     class="fixed top-4 left-1/2 z-50 -translate-x-1/2 transform"
>
    <div class="rounded-lg bg-red-600 px-6 py-4 text-white shadow-lg">
        <span x-text="message"></span>
    </div>
</div>