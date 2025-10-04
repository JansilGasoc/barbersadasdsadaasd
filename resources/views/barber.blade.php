<x-app-layout>
    <script>
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ session('success') }}',
                confirmButtonColor: '#10b981',
                timer: 3000,
                timerProgressBar: true,
                showConfirmButton: false,
                toast: true,
                position: 'top-end'
            });
        @endif

        @if (session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Oops!',
                text: '{{ session('error') }}',
                confirmButtonColor: '#ef4444',
            });
        @endif
    </script>

    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-center gap-3">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200">
                {{ __('Barbers Management') }}
            </h2>
            <button id="addBarberBtn"
                class="bg-emerald-500 text-white px-4 py-2 rounded-lg hover:bg-emerald-600 transition-colors shadow-sm text-sm font-medium">
                + Add Barber
            </button>
        </div>
    </x-slot>

    <div class="py-8 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Barber Table -->
        <div
            class="bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden border border-gray-200 dark:border-gray-700">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-900">
                        <tr>
                            <th
                                class="px-4 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                                name
                            </th>
                            <th
                                class="px-4 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                                Contact Info
                            </th>
                            <th
                                class="px-4 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                                Address
                            </th>
                            <th
                                class="px-4 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                                email
                            </th>

                            <th
                                class="px-4 py-3 text-center text-xs font-medium text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach ($barbers as $barber)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-750 transition-colors">
                                <td class="px-4 py-3 font-medium text-gray-900 dark:text-gray-100">
                                    {{ $barber->name }}
                                </td>
                                <td class="px-4 py-3 font-medium text-gray-900 dark:text-gray-100">
                                    {{ $barber->phone }}<br>
                                </td>
                                <td class="px-4 py-3 font-medium text-gray-900 dark:text-gray-100">
                                    {{ $barber->address ?: 'N/A' }}
                                </td>
                                <td class="px-4 py-3 font-medium text-gray-900 dark:text-gray-100">
                                    {{ $barber->email ?: 'N/A' }}
                                </td>

                                <td class="px-4 py-3 text-center">
                                    <form action="{{ route('barber.destroy', $barber->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this barber?')"
                                        class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-500 text-white px-3 py-1.5 rounded-md hover:bg-red-600 transition-colors shadow-sm text-xs font-medium">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Modal -->
        <div id="addBarberModal"
            class="hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-40 z-50 p-4">
            <div
                class="bg-white dark:bg-gray-800 rounded-lg shadow-xl w-full max-w-md relative animate-slide-in border border-gray-200 dark:border-gray-700">
                <!-- Modal Header -->
                <div class="flex items-center justify-between p-4 border-b border-gray-200 dark:border-gray-700">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Add New Barber</h3>
                    <button id="closeModal"
                        class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-200 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>

                <!-- Modal Body -->
                <form action="{{ route('barber.store') }}" method="POST" class="p-4 space-y-4">
                    @csrf

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Name</label>
                        <input type="text" name="name"
                            class="border border-gray-300 dark:border-gray-600 px-3 py-2 rounded-lg w-full bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition-colors"
                            placeholder="Enter barber name" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Email</label>
                        <input type="email" name="email"
                            class="border border-gray-300 dark:border-gray-600 px-3 py-2 rounded-lg w-full bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition-colors"
                            placeholder="email@example.com" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Phone</label>
                        <input type="text" name="phone" value="{{ old('phone') }}"
                            class="border border-gray-300 dark:border-gray-600 px-3 py-2 rounded-lg w-full bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition-colors"
                            placeholder="09123456789" inputmode="numeric" pattern="^\d{11}$" minlength="11"
                            maxlength="11" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Address</label>
                        <textarea name="address" rows="2"
                            class="border border-gray-300 dark:border-gray-600 rounded-lg w-full px-3 py-2 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none resize-none transition-colors"
                            placeholder="Enter address"></textarea>
                    </div>

                    <!-- Modal Footer -->
                    <div class="flex justify-end gap-2 pt-2">
                        <button type="button" id="cancelModal"
                            class="px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors text-sm font-medium">
                            Cancel
                        </button>
                        <button type="submit"
                            class="bg-emerald-500 text-white px-4 py-2 rounded-lg hover:bg-emerald-600 transition-colors shadow-sm text-sm font-medium">
                            Save Barber
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        const addBtn = document.getElementById('addBarberBtn');
        const modal = document.getElementById('addBarberModal');
        const closeBtn = document.getElementById('closeModal');
        const cancelBtn = document.getElementById('cancelModal');

        addBtn.addEventListener('click', () => {
            modal.classList.remove('hidden');
        });

        closeBtn.addEventListener('click', () => {
            modal.classList.add('hidden');
        });

        cancelBtn.addEventListener('click', () => {
            modal.classList.add('hidden');
        });

        window.addEventListener('click', (e) => {
            if (e.target === modal) {
                modal.classList.add('hidden');
            }
        });
    </script>

    <style>
        @keyframes slide-in {
            from {
                transform: translateY(-10px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .animate-slide-in {
            animation: slide-in 0.2s ease-out;
        }
    </style>
</x-app-layout>
