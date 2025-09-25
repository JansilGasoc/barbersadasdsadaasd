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
        <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
            <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Barbers Management') }}
            </h2>
            <button id="addBarberBtn"
                class="bg-emerald-500 text-white px-5 py-2 rounded-lg hover:bg-emerald-600 transition shadow">
                Add New Barber
            </button>
        </div>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <!-- Barber Table -->
        <div class="bg-white dark:bg-gray-800 shadow-lg rounded-xl overflow-hidden">
            <table class="min-w-full text-sm border-collapse divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-gray-100 dark:bg-gray-700 dark:text-gray-300 text-xs uppercase tracking-wide">
                    <tr>
                        <th class="p-3 text-left">Barber</th>
                        <th class="p-3 text-left">Appointments</th>
                        <th class="p-3 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach ($barbers as $barber)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-900 transition">
                            <td class="p-3 font-medium text-gray-900 dark:text-gray-100">{{ $barber->name }}</td>
                            <td class="p-3 text-gray-700 dark:text-gray-300">
                                @if ($barber->barberAppointments->isNotEmpty())
                                    <ul class="list-disc pl-5 space-y-1 max-h-40 overflow-y-auto">
                                        @foreach ($barber->barberAppointments as $appt)
                                            <li>
                                                {{ $appt->customer_name }} - {{ $appt->appointment_date }}
                                                ({{ \Carbon\Carbon::parse($appt->appointment_time)->format('h:i A') }})
                                                - <span class="italic">{{ $appt->service }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                @else
                                    <span class="text-gray-400">No bookings yet</span>
                                @endif
                            </td>
                            <td class="p-3 text-center">
                                <form action="{{ route('barber.destroy', $barber->id) }}" method="POST"
                                    onsubmit="return confirm('Delete this barber?')" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-600 text-white px-3 py-1 rounded-lg hover:bg-red-700 transition shadow text-xs">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Modal -->
        <div id="addBarberModal"
            class="hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-2xl w-full max-w-md p-6 relative animate-slide-in">
                <button id="closeModal"
                    class="absolute top-3 right-3 text-gray-500 hover:text-gray-800 text-2xl">&times;</button>
                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-5">Add New Barber</h3>
                <form action="{{ route('barber.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <input type="text" name="name" placeholder="Barber Name"
                        class="border p-3 rounded-lg w-full focus:ring-emerald-500 focus:outline-none" required>
                    <input type="email" name="email" placeholder="Email"
                        class="border p-3 rounded-lg w-full focus:ring-emerald-500 focus:outline-none" required>
                    <input type="password" name="password" placeholder="Password"
                        class="border p-3 rounded-lg w-full focus:ring-emerald-500 focus:outline-none" required>
                    <div class="flex justify-end gap-3">
                        <button type="button" id="cancelModal"
                            class="px-4 py-2 rounded-lg border hover:bg-gray-100 dark:hover:bg-gray-700 transition">Cancel</button>
                        <button type="submit"
                            class="bg-emerald-500 text-white px-4 py-2 rounded-lg hover:bg-emerald-600 transition shadow">Add
                            Barber</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Pure JavaScript -->
    <script>
        const addBtn = document.getElementById('addBarberBtn');
        const modal = document.getElementById('addBarberModal');
        const closeBtn = document.getElementById('closeModal');
        const cancelBtn = document.getElementById('cancelModal');

        // Show modal
        addBtn.addEventListener('click', () => {
            modal.classList.remove('hidden');
        });

        // Hide modal
        closeBtn.addEventListener('click', () => {
            modal.classList.add('hidden');
        });

        cancelBtn.addEventListener('click', () => {
            modal.classList.add('hidden');
        });

        // Close modal when clicking outside content
        window.addEventListener('click', (e) => {
            if (e.target === modal) {
                modal.classList.add('hidden');
            }
        });
    </script>

    <style>
        @keyframes slide-in {
            from {
                transform: translateY(-20px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .animate-slide-in {
            animation: slide-in 0.3s ease-out;
        }
    </style>
</x-app-layout>
