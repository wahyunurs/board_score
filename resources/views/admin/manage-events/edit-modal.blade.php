<!-- Edit modal -->
<div id="edit-modal-{{ $event->id }}" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full bg-opacity-50">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow light:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t light:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 light:text-white">
                    Edit Event
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center light:hover:bg-gray-600 light:hover:text-white"
                    data-modal-toggle="edit-modal-{{ $event->id }}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 md:p-8">
                <form method="POST" action="{{ route('manage-events.update', $event->id) }}" id="edit-event-form">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" id="id" value="{{ $event->id }}">
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="short_title"
                                class="block mb-2 text-sm font-medium text-gray-900 light:text-white">Judul
                                Singkat</label>
                            <input type="text" name="short_title" id="short_title"
                                class="bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                                required value="{{ $event->short_title }}">
                        </div>
                        <div class="col-span-2">
                            <label for="long_title"
                                class="block mb-2 text-sm font-medium text-gray-900 light:text-white">Judul
                                Lengkap</label>
                            <input type="text" name="long_title" id="long_title"
                                class="bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                                required value="{{ $event->long_title }}">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="level"
                                class="block mb-2 text-sm font-medium text-gray-900 light:text-white">Level</label>
                            <input type="text" name="level" id="level"
                                class="bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                                required value="{{ $event->level }}">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="theme"
                                class="block mb-2 text-sm font-medium text-gray-900 light:text-white">Tema</label>
                            <input type="text" name="theme" id="theme"
                                class="bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                                value="{{ $event->theme }}">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="date"
                                class="block mb-2 text-sm font-medium text-gray-900 light:text-white">Tanggal</label>
                            <input type="date" name="date" id="date"
                                class="bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                                value="{{ $event->date }}">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="location"
                                class="block mb-2 text-sm font-medium text-gray-900 light:text-white">Lokasi</label>
                            <input type="text" name="location" id="location"
                                class="bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                                value="{{ $event->location }}">
                        </div>
                        <div class="col-span-2">
                            <label for="description"
                                class="block mb-2 text-sm font-medium text-gray-900 light:text-white">Deskripsi</label>
                            <textarea name="description" id="description" rows="3"
                                class="bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5">{{ $event->description }}</textarea>
                        </div>
                    </div>
                    <button type="submit"
                        class="text-white inline-flex items-center bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center light:bg-yellow-600 light:hover:bg-yellow-700 light:focus:ring-yellow-80">
                        Update
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
