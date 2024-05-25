<div id="flashMsgs">
    @if (session('msg_success'))
        <div
            class="fixed top-0 left-[50%] translate-x-[-50%] translate-y-10 bg-green-200 rounded-md py-2 px-4 text-green-700 shadow-md">
            {{ session('msg_success') }}
        </div>
    @endif

    @if (session('msg_error'))
        <div
            class="fixed top-0 left-[50%] translate-x-[-50%] translate-y-10 bg-red-200 rounded-md py-2 px-4 text-red-700 shadow-md">
            {{ session('msg_success') }}
        </div>
    @endif
</div>


@push('scripts')
    <script>
        const container = document.getElementById("flashMsgs");
        for (const child of container.children) {
            setTimeout(() => {
                child.remove();
            }, 5000);
        }
        container.remove();
    </script>
@endpush
