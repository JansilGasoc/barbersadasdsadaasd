<x-app-layout>
    <script>
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ session('success') }}',
                confirmButtonColor: '#10b981', // Emerald 500
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
                confirmButtonColor: '#ef4444', // Red 500
            });
        @endif
    </script>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Appointments') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl">
                @if ($appointments->isNotEmpty())
                    <div class="overflow-x-auto">
                        <table class="w-full border-collapse text-sm">
                            <thead
                                class="bg-gray-100 dark:bg-gray-700 dark:text-gray-300 text-xs uppercase tracking-wide">
                                <tr>
                                    <th class="p-3 text-left">Customer</th>
                                    <th class="p-3 text-left">Phone</th>
                                    <th class="p-3 text-left">Service</th>
                                    <th class="p-3 text-left">Date</th>
                                    <th class="p-3 text-left">Time</th>
                                    <th class="p-3 text-left">Notes</th>
                                    <th class="p-3 text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($appointments as $appt)
                                    <tr
                                        class="odd:bg-gray-50 dark:odd:bg-gray-900 border-b dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">
                                        <td class="p-3 font-medium text-gray-900 dark:text-gray-100">
                                            {{ $appt->customer_name }}</td>
                                        <td class="p-3 text-gray-700 dark:text-gray-300">{{ $appt->customer_phone }}
                                        </td>
                                        <td class="p-3 text-gray-700 dark:text-gray-300">{{ $appt->service }}</td>
                                        <td class="p-3 text-gray-700 dark:text-gray-300">{{ $appt->appointment_date }}
                                        </td>
                                        <td class="p-3 text-gray-700 dark:text-gray-300">
                                            {{ \Carbon\Carbon::parse($appt->appointment_time)->format('h:i A') }}
                                        </td>
                                        <td class="p-3 text-gray-700 dark:text-gray-300">{{ $appt->notes ?: 'none' }}
                                        </td>
                                        <td class="p-3 text-center flex w-full justify-center gap-2">
                                            <form action="{{ route('delete-appointment', $appt->id) }}" method="POST"
                                                onsubmit="return confirm('Are you sure you want to delete this appointment?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="bg-red-600 text-white px-3 py-1 rounded-lg hover:bg-red-700 text-xs">
                                                    Canceled
                                                </button>
                                            </form>
                                            <form action="{{ route('appointments.done', $appt->id) }}" method="POST"
                                                onsubmit="return confirm('Are you sure you want to save this appointment?')">
                                                @csrf
                                                @method('POST')
                                                <button type="submit"
                                                    class="bg-green-600 text-white px-3 py-1 rounded-lg hover:bg-green-700 text-xs">
                                                    Done
                                                </button>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="p-4 bg-gray-50 dark:bg-gray-900 border-t dark:border-gray-700">
                        {{ $appointments->links() }}
                    </div>
                @else
                    <div class="p-6 text-center text-gray-500 dark:text-gray-400">
                        <svg class="mx-auto h-12 w-12 text-gray-400 dark:text-gray-500" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 17v-6h6v6m2 4H7a2 2 0 01-2-2V7a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2z" />
                        </svg>
                        <p class="mt-3 text-sm">No appointments yet.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
