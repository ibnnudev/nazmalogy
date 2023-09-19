<x-guest-layout>
    <div
        class="grid grid-cols-1 lg:grid-cols-1 xl:grid-cols-3 gap-8 max-w-7xl mx-auto py-6 sm:py-12 lg:py-24 px-7 sm:px-6 lg:px-8">
        {{-- Course Material --}}
        <div class="col-span-1 hidden xl:block">
            <div id="course-material" class="w-100 h-fit bg-white  rounded-lg p-6">
                <div class="text-base my-5 text-black text-left font-normal">
                    <p class="font-bold text-base">Dasar-dasar Project Network Planning</p>
                    <p class="font-normal text-sm text-[#757575]">{{ $course->lesson_count }} Materi Siap Dipelajari</p>
                </div>
                <div class="text-sm mt-9 text-black">
                    <div id="accordion-collapse" data-accordion="collapse">
                        @foreach ($course->playlists as $key => $playlist)
                            <h2 id="accordion-collapse-heading-{{ $key + 1 }}">
                                <button type="button"
                                    class="flex items-center justify-between w-full py-3 px-5 font-medium text-left border border-b-1 border-gray-200 focus:ring-4 focus:ring-gray-200 focus:text-black rounded-lg mb-4"
                                    data-accordion-target="#accordion-collapse-body-{{ $key + 1 }}"
                                    aria-expanded="{{ $playlist->id == $playlist_id ? 'true' : 'false' }}"
                                    aria-controls="accordion-collapse-body-{{ $key + 1 }}">
                                    <span>{{ $playlist->title }}</span>
                                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M9 5 5 1 1 5" />
                                    </svg>
                                </button>
                            </h2>
                            <div id="accordion-collapse-body-{{ $key + 1 }}"
                                class="{{ $playlist->id == $playlist_id ? 'block' : 'hidden' }}"
                                aria-labelledby="accordion-collapse-heading-{{ $key + 1 }}">
                                <div class="p-2 border border-b-1 border-gray-200 rounded-lg mb-4">
                                    {{-- Isi accordion disini --}}
                                    @foreach ($playlist->chapters as $chapter)
                                        <div
                                            class="flex rounded-lg items-center bg-white justify-start text-xs 2xl:text-sm gap-x-3 py-2 px-4">
                                            @if ($chapter->is_finished)
                                                <ion-icon name="checkmark-circle"
                                                    class="w-5 h-5 text-primary"></ion-icon>
                                            @else
                                                <ion-icon name="radio-button-off"
                                                    class="w-5 h-5 text-gray-400"></ion-icon>
                                            @endif
                                            <a
                                                @if ($chapter->is_finished) href="{{ route('user.learn.chapter', [$playlist->id, $chapter->id]) }}" @endif>{{ $chapter->title }}
                                            </a>
                                        </div>
                                    @endforeach

                                    @if ($playlist->quiz != null)
                                        <div
                                            class="rounded-lg flex items-center justify-start {{ $playlist->quiz->id == $quiz_id ? 'bg-gray-100' : 'bg-white' }} text-xs 2xl:text-sm gap-x-3 py-2 px-4">
                                            @if ($playlist->quiz->is_finished)
                                                <ion-icon name="checkmark-circle"
                                                    class="w-5 h-5 text-primary"></ion-icon>
                                            @else
                                                <ion-icon name="radio-button-off"
                                                    class="w-5 h-5 text-gray-400"></ion-icon>
                                            @endif
                                            <a
                                                @if ($playlist->quiz->is_finished) href="{{ route('user.learn.quiz', [$playlist->id, $playlist->quiz->id]) }}" @endif>
                                                {{ $playlist->quiz->title }}
                                                ({{ $playlist->quiz->questions->count() }} Soal )
                                            </a>
                                        </div>
                                    @endif
                                    {{-- Akhir dari isi accordion --}}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        {{-- Answer --}}
        <div class="col-span-2 bg-white rounded-xl p-8 h-fit">
            <div class="">
                <p class="text-lg font-semibold text-center">Hasil Quiz</p>
                <div class="grid grid-cols-1 lg:grid-cols-2 max-w-xs mx-auto mt-12">
                    <div class="text-center">
                        <h3 class="font-bold text-2xl mb-2">
                            {{ $resultQuiz['correct_answer'] }}/{{ $resultQuiz['total_question'] }}
                        </h3>
                        <p class="text-sm">Jawaban Benar</p>
                    </div>
                    {{-- <div class="text-center">
                        <h3 class="font-bold text-2xl mb-2">
                            05.00 <span class="text-sm font-normal">Menit</span>
                        </h3>
                        <p class="text-sm">Waktu Pengerjaan</p>
                    </div> --}}
                    <div class="text-center">
                        <h3 class="font-bold text-2xl mb-2">
                            @if ($resultQuiz['is_passed'])
                                <span>👌 Lulus</span>
                            @else
                                <span>👎 Tidak Lulus</span>
                            @endif
                        </h3>
                        <p class="text-sm">
                            Status
                        </p>
                    </div>
                </div>
                <div class="flex justify-center mt-8 space-x-2">
                    @if (isset($isLast))
                        <x-button text="Ulang Quiz"
                            onclick="window.location.href = '{{ route('user.learn.replay', [$playlist_id, $quiz_id]) }}'" />
                        <x-button text="Selesai"
                            onclick="window.location.href = '{{ route('user.dashboard.index') }}'" />
                    @else
                        @if ($resultQuiz['is_passed'])
                            <x-button text="Ulang Quiz"
                                onclick="window.location.href = '{{ route('user.learn.replay', [$playlist_id, $quiz_id]) }}'" />
                            <x-button text="Selanjutnya"
                                onclick="window.location.href = '{{ route('user.learn.chapter', [$nextPlaylist, $nextChapter]) }}'" />
                        @else
                            <x-button text="Ulang Quiz"
                                onclick="window.location.href = '{{ route('user.learn.quiz', [$playlist_id, $quiz_id]) }}'" />
                        @endif
                    @endif
                </div>
                <p class="text-xs 2xl:text-sm text-center mt-6 text-gray-500">
                    Knowledge check: {{ $quiz->title }}
                </p>
            </div>
        </div>
    </div>

    @push('js-internal')
        <script>
            @if (isset($isLast))
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: 'Selamat, kamu telah menyelesaikan semua materi pada kelas ini',
                    showConfirmButton: true,
                    confirmButtonText: 'Kembali ke dashboard',
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '{{ route('user.dashboard.index') }}'
                    }
                })
            @endif
        </script>
    @endpush
</x-guest-layout>
