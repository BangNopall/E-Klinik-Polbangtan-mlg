<x-app-layout>
    {{-- Content Header --}}
    <div class="items-center justify-between px-2 sm:px-4 py-3 lg:py-5 border-b dark:border-blue-800">
        <h1 class="text-2xl font-semibold">Data Petugas</h1>
        <div class="text-md font-light text-gray-500 dark:text-gray-400">{{$user->name}}</div>
    </div>
    {{-- Main Content --}}
    <div class="px-2 sm:px-4 py-3 lg:py-5">
        <div class="flex flex-col md:flex-row justify-center items-center sm:items-start gap-4">
            <div class="p-4 sm:p-8 bg-white dark:bg-darker sm:rounded-lg w-full md:w-auto">
                <div class="w-full md:max-w-xl">
                    @include('lainnya.petugas.partials.profile-content')
                </div>
            </div>
            <div class="flex flex-col gap-4 w-full md:w-[800px]">
                <div class="p-4 sm:p-8 bg-white dark:bg-darker sm:rounded-lg">
                    <div class="w-full">
                        @include('lainnya.petugas.partials.password-content')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('src/js/lainnya/data-user.js') }}"></script>
</x-app-layout>
