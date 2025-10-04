<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Appointment History') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6">
        <div class="bg-white dark:bg-gray-800 shadow-md sm:rounded-lg p-6">
            <h1 class="text-2xl font-semibold text-gray-700 dark:text-gray-100 mb-4">History Dashboard</h1>

            <div class="overflow-x-auto">
                <table class="min-w-full text-sm text-left text-gray-600 dark:text-gray-300">
                    <thead class="text-xs uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-200">
                        <tr>
                            <th class="px-6 py-3">Barber</th>
                            <th class="px-6 py-3">Customer</th>
                            <th class="px-6 py-3">Phone</th>
                            <th class="px-6 py-3">Service</th>
                            <th class="px-6 py-3">Date</th>
                            <th class="px-6 py-3">Time</th>
                            <th class="px-6 py-3">Notes</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @forelse($histories as $history)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-900 transition">
                                <td class="px-6 py-4 font-medium text-gray-900 dark:text-gray-100">
                                    {{ $history->barber->name ?? 'N/A' }}
                                </td>
                                <td class="px-6 py-4">{{ $history->customer_name }}</td>
                                <td class="px-6 py-4">{{ $history->customer_phone }}</td>
                                <td class="px-6 py-4">{{ $history->service }}</td>
                                <td class="px-6 py-4">{{ $history->appointment_date }}</td>
                                <td class="px-6 py-4">{{ $history->appointment_time }}</td>
                                <td class="px-6 py-4">{{ $history->notes ?: 'none' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                                    No completed appointments yet.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $histories->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
