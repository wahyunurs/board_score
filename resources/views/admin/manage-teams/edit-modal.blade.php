<!-- Main modal -->
<div id="edit-modal-{{ $team->id }}" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full bg-opacity-50">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow light:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t light:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 light:text-white">
                    Edit Team
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center light:hover:bg-gray-600 light:hover:text-white"
                    data-modal-toggle="edit-modal-{{ $team->id }}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4">
                <form method="POST" action="{{ route('manage-teams.update', $team->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $team->id }}">

                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 light:text-white">Team
                                Name</label>
                            <input type="text" name="name" id="name-{{ $team->id }}"
                                class="bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                required value="{{ old('name', $team->name) }}">
                        </div>

                        <div class="col-span-2">
                            <label for="score"
                                class="block mb-2 text-sm font-medium text-gray-900 light:text-white">Score</label>
                            <input type="number" name="score" id="score-{{ $team->id }}"
                                class="bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                required value="{{ old('score', $team->score) }}">
                        </div>

                        <div class="col-span-2">
                            <label for="logo"
                                class="block mb-2 text-sm font-medium text-gray-900 light:text-white">Logo</label>
                            <input type="file" name="logo" id="logo-{{ $team->id }}"
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 light:text-gray-400 focus:outline-none">
                        </div>
                    </div>

                    <button type="submit"
                        class="text-white inline-flex items-center bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center light:bg-yellow-600 light:hover:bg-yellow-700 light:focus:ring-yellow-800">
                        Update
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
