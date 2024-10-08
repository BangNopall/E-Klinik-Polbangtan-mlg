<x-app-layout>
    {{-- Content Header --}}
    <div class="flex items-center justify-between px-2 sm:px-4 py-3 lg:py-5 border-b dark:border-blue-800">
        <h1 class="text-2xl font-semibold">Medical Overview</h1>
    </div>
    {{-- Main Content --}}
    <div class="px-2 sm:px-4 py-3 lg:py-5 border-b dark:border-blue-600">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 w-full">
            <div class="bg-white dark:bg-darker p-4 rounded-lg">
                <div class="text-sm mb-3 flex items-center">
                    <span class="icon-[solar--user-linear] me-2"></span>
                    Total Pasien
                </div>
                <span class="text-xl font-semibold">{{ $pasien }}</span>
                <div class="mt-3 text-xs text-yellow-400 font-light">Pasien terdaftar.</div>
            </div>
            <div class="bg-white dark:bg-darker p-4 rounded-lg">
                <div class="text-sm mb-3 flex items-center">
                    <span class="icon-[mdi--doctor] me-2"></span>
                    Total Dokter
                </div>
                <span class="text-xl font-semibold">{{ $dokter }}</span>
                <div class="mt-3 text-xs text-yellow-400">Dokter terdaftar.</div>
            </div>
            <div class="bg-white dark:bg-darker p-4 rounded-lg">
                <div class="flex justify-center items-center">
                    <div class="flex flex-col gap-1 text-center">
                        <div class="flex items-center justify-center">
                            @if (Auth::user()->avatar_url != null)
                                <img class="w-10 h-10 rounded-full"
                                    src="{{ asset('storage/images/' . Auth::user()->avatar_url) }}"
                                    alt="{{ Auth::user()->name }}" />
                            @else
                                <img class="w-10 h-10 rounded-full" :src="generateAvatar('{{ Auth::user()->email }}')"
                                    alt="{{ Auth::user()->name }}" />
                            @endif
                        </div>
                        <div class="flex flex-col">
                            <span class="font-semibold">{{ Auth::user()->name }}</span>
                            <span class="text-sm text-gray-700 dark:text-gray-300">{{ Auth::user()->role }}</span>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="px-2 sm:px-4 py-3 lg:py-5">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
            <div class="bg-white dark:bg-darker p-4 rounded-lg">
                <div class="flex items-center gap-5">
                    <div class="flex items-center gap-2 text-lg font-medium">
                        <span class="icon-[mdi--paper]"></span>
                        <span class="">Surat Laporan</span>
                    </div>
                    <div class="h-[50px] w-[2px] bg-gray-200 dark:bg-gray-400"></div>
                    <div class="font-medium text-lg">
                        <span>{{ $sk }}</span>
                    </div>
                </div>
                <div class="bg-gray-100 dark:bg-dark p-2 rounded-md mt-2">
                    <div class="text-sm">Daftar Surat</div>
                    <div class="mt-1 w-full">
                        <canvas id="sk" :class="{ 'dark': isDark }"></canvas>
                    </div>
                </div>
            </div>
            <div class="bg-white dark:bg-darker p-4 rounded-lg">
                <div class="flex items-center gap-5">
                    <div class="flex items-center gap-2 text-lg font-medium">
                        <span class="ri-file-list-3-line"></span>
                        <span class="">Rekam Medis</span>
                    </div>
                    <div class="h-[50px] w-[2px] bg-gray-200 dark:bg-gray-400"></div>
                    <div class="font-medium text-lg">
                        <span>{{ $rmcount }}</span>
                    </div>
                </div>
                <div class="bg-gray-100 dark:bg-dark p-2 rounded-md mt-2">
                    <div class="text-sm">5 Rekam medis terbaru</div>
                    <div class="overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="text-sm text-left text-gray-500 dark:text-gray-400 shadow-md rounded mt-2">
                            <thead class="text-xs text-gray-900 uppercase bg-white dark:bg-darker dark:text-gray-100">
                                <tr class="whitespace-nowrap">
                                    <th scope="col" class="p-2">
                                        Tanggal
                                    </th>
                                    <th scope="col" class="p-2">
                                        Pengguna
                                    </th>
                                    <th scope="col" class="p-2">
                                        Keluhan
                                    </th>
                                    <th scope="col" class="p-2">
                                        Diagnosa
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rm as $item)
                                    <tr
                                        class="bg-gray-100 border-b dark:bg-dark dark:border-gray-700 whitespace-nowrap">
                                        <td class="p-2">
                                            {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F') }}
                                        </td>
                                        <td class="p-2">
                                            {{ $item->pasien->name }}
                                        </td>
                                        <td class="p-2">
                                            {{ $item->keluhan }}
                                        </td>
                                        <td class="p-2">
                                            {{ $item->diagnosa }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3">
            <div class="bg-white dark:bg-darker p-4 rounded-lg">
                <div class="flex items-center gap-5">
                    <div class="flex items-center gap-2 text-lg font-medium">
                        <span class="ri-capsule-fill"></span>
                        <span class="">Surat Keterangan Berobat</span>
                    </div>
                    <div class="h-[50px] w-[2px] bg-gray-200 dark:bg-gray-400"></div>
                    <div class="font-medium text-lg">
                        <span>{{ $skb }}</span>
                    </div>
                </div>
                <div class="bg-gray-100 dark:bg-dark p-2 rounded-md mt-2">
                    <div class="text-sm">5 Surat Pasien Terbaru</div>
                    <div class="w-full mt-1" style="width: 100%;">
                        <canvas id="skb" :class="{ 'dark': isDark }"></canvas>
                    </div>
                </div>
            </div>
            <div class="bg-white dark:bg-darker p-4 rounded-lg">
                <div class="flex items-center gap-5">
                    <div class="flex items-center gap-2 text-lg font-medium">
                        <span class="ri-file-list-3-line"></span>
                        <span class="">Surat Keterangan Sakit</span>
                    </div>
                    <div class="h-[50px] w-[2px] bg-gray-200 dark:bg-gray-400"></div>
                    <div class="font-medium text-lg">
                        <span>{{ $sks }}</span>
                    </div>
                </div>
                <div class="bg-gray-100 dark:bg-dark p-2 rounded-md mt-2">
                    <div class="text-sm">5 Surat Pasien Terbaru</div>
                    <div class="w-full mt-1" style="width: 100%;">
                        <canvas id="sks" :class="{ 'dark': isDark }"></canvas>
                    </div>
                </div>
            </div>
            <div class="bg-white dark:bg-darker p-4 rounded-lg">
                <div class="flex items-center gap-5">
                    <div class="flex items-center gap-2 text-lg font-medium">
                        <span class="ri-hospital-line"></span>
                        <span class="">Surat Rujukan</span>
                    </div>
                    <div class="h-[50px] w-[2px] bg-gray-200 dark:bg-gray-400"></div>
                    <div class="font-medium text-lg">
                        <span>{{ $sr }}</span>
                    </div>
                </div>
                <div class="bg-gray-100 dark:bg-dark p-2 rounded-md mt-2">
                    <div class="text-sm">5 Surat Pasien Terbaru</div>
                    <div class="w-full mt-1" style="width: 100%;">
                        <canvas id="sr" :class="{ 'dark': isDark }"></canvas>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
    <script src="{{ asset('chartjs/dist/chart.umd.js') }}" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="module" src="{{ asset('src/js/kesehatan/dashboard-admin.js') }}"></script>
</x-app-layout>
