<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Akun Profil') }}
        </h2>
    </header>
    <div class="my-3">
        @if ($user->avatar_url == null)
            <div class="object-cover flex justify-center w-full md:w-[250px] p-1 rounded-md">
                <img src="https://placehold.co/500x500" alt="Preview"
                    class="object-cover w-[200px] p-1 rounded-md ring-2 ring-indigo-300 dark:ring-darkerhover">
            </div>
        @else
            <div class="object-cover flex justify-center w-full md:w-[250px] p-1 rounded-md">
                <img src="{{ Storage::url('images/' . $user->avatar_url) }}" alt="Preview"
                    class="object-cover w-[200px] p-1 rounded-md ring-2 ring-indigo-300 dark:ring-darkerhover">
            </div>
        @endif
    </div>
    <div class="space-y-4">
        <div>
            <x-input-label for="name" :value="'Nama Lengkap'" />
            <x-input-text id="name" name="name" type="text" class="mt-2 block w-full cursor-not-allowed"
                :value="old('name', isset($user) ? $user->name : '')" 
                disabled readonly placeholder="Kosong" />
        </div>
    </div>
</section>
