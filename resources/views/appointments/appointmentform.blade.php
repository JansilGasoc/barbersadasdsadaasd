<x-guest-layout>
    <script>
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ session('success') }}',
                confirmButtonColor: '#10b981',
                timer: 10000,
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

    <div class="max-w-2xl mx-auto px-4 py-8">
        <!-- Header Section -->
        <div class="text-center mb-8">
            <div
                class="mx-auto h-16 w-16 bg-gradient-to-r from-amber-500 to-orange-600 rounded-full flex items-center justify-center shadow-lg mb-3">
                <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                    </path>
                </svg>
            </div>
            <h1 class="text-3xl font-bold text-gray-300 mb-1">Book Your Appointment</h1>
            <p class="text-gray-400">Schedule your visit with Benz Mercader</p>
        </div>

        <!-- Main Form Card -->
        <div class="bg-gray-800 shadow-xl rounded-xl p-6 md:p-8 border border-gray-700">
            <form action="{{ route('appointment.create') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Personal Information Section -->
                <div>
                    <h2 class="text-lg font-semibold text-white mb-4 flex items-center">
                        <svg class="h-5 w-5 text-amber-500 mr-2" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        Personal Information
                    </h2>

                    <div class="space-y-4">
                        <!-- Name -->
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-1">Full Name</label>
                            <input type="text" name="customer_name" value="{{ old('customer_name') }}"
                                class="block w-full px-4 py-2.5 border border-gray-600 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 bg-gray-700 text-white placeholder-gray-400"
                                placeholder="Enter your full name" required>
                            @error('customer_name')
                                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Phone -->
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-1">Phone Number</label>
                            <input type="text" name="customer_phone" value="{{ old('customer_phone') }}"
                                class="block w-full px-4 py-2.5 border border-gray-600 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 bg-gray-700 text-white placeholder-gray-400"
                                placeholder="09123456789" inputmode="numeric" pattern="^\d{11}$" minlength="11"
                                maxlength="11" required>
                            @error('customer_phone')
                                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Service Selection Section -->
                <div>
                    <h2 class="text-lg font-semibold text-white mb-4 flex items-center">
                        <svg class="h-5 w-5 text-amber-500 mr-2" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z">
                            </path>
                        </svg>
                        Service & Barber
                    </h2>

                    <div class="space-y-4">
                        <!-- Service -->
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-1">Choose Your Service</label>
                            <select name="service"
                                class="block w-full px-4 py-2.5 border border-gray-600 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 bg-gray-700 text-white"
                                required>
                                <option value="" disabled selected>-- Select a service --</option>
                                <option value="Low Taper Fade">Low Taper Fade – ₱50</option>
                                <option value="Army Cut">Army Cut – ₱50</option>
                                <option value="Buzz Cut">Buzz Cut – ₱60</option>
                                <option value="Burst Fade">Burst Fade – ₱50</option>
                                <option value="Low Taper Mullet">Low Taper Mullet – ₱60</option>
                                <option value="Mullet Fade">Mullet Fade – ₱60</option>
                                <option value="Curly Blowout Taper">Curly Blowout Taper – ₱60</option>
                                <option value="Blowout Taper">Blowout Taper – ₱60</option>
                                <option value="Angular Fringe">Angular Fringe – ₱60</option>
                            </select>
                            @error('service')
                                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Barber -->
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-1">Choose Your Barber</label>
                            <select name="barber_id" required
                                class="block w-full px-4 py-2.5 border border-gray-600 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 bg-gray-700 text-white">
                                <option value="" disabled selected>-- Select a barber --</option>
                                @foreach ($barbers as $barber)
                                    <option value="{{ $barber->id }}">{{ $barber->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Date & Time Section -->
                <div>
                    <h2 class="text-lg font-semibold text-white mb-4 flex items-center">
                        <svg class="h-5 w-5 text-amber-500 mr-2" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Schedule Your Visit
                    </h2>

                    <div class="space-y-4">
                        <!-- Date -->
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-1">Preferred Date</label>
                            <input type="date" name="appointment_date" value="{{ old('appointment_date') }}"
                                min="{{ date('Y-m-d') }}" max="{{ date('Y-m-d') }}"
                                class="block w-full px-4 py-2.5 border border-gray-600 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 bg-gray-700 text-white"
                                required>
                            @error('appointment_date')
                                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Time -->
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-1">Preferred Time</label>
                            <select name="appointment_time" id="appointment_time"
                                class="block w-full px-4 py-2.5 border border-gray-600 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 bg-gray-700 text-white"
                                required>
                                @for ($hour = 7; $hour <= 18; $hour++)
                                    @php
                                        $time1 = sprintf('%02d:00', $hour);
                                        $time2 = sprintf('%02d:30', $hour);
                                    @endphp

                                    <option value="{{ $time1 }}"
                                        {{ in_array($time1, $bookedTimes ?? []) ? 'disabled class=bg-red-800 text-gray-400' : '' }}>
                                        {{ date('h:i A', strtotime($time1)) }}
                                        {{ in_array($time1, $bookedTimes ?? []) ? ' (Unavailable)' : '' }}
                                    </option>

                                    <option value="{{ $time2 }}"
                                        {{ in_array($time2, $bookedTimes ?? []) ? 'disabled class=bg-red-800 text-gray-400' : '' }}>
                                        {{ date('h:i A', strtotime($time2)) }}
                                        {{ in_array($time2, $bookedTimes ?? []) ? ' (Unavailable)' : '' }}
                                    </option>
                                @endfor
                            </select>
                            @error('appointment_time')
                                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Business Hours Info -->
                    <div class="mt-3 p-3 bg-amber-900/20 rounded-lg border border-amber-800">
                        <p class="text-sm text-amber-200 flex items-start">
                            <svg class="h-4 w-4 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span><strong>Business Hours:</strong> Monday - Sunday, 7:00 AM - 7:00 PM</span>
                        </p>
                    </div>
                </div>

                <!-- Additional Notes Section -->
                <div>
                    <h2 class="text-lg font-semibold text-white mb-4 flex items-center">
                        <svg class="h-5 w-5 text-amber-500 mr-2" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                            </path>
                        </svg>
                        Additional Notes
                    </h2>

                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-1">Special Requests (Optional)</label>
                        <textarea name="notes" rows="3"
                            class="block w-full px-4 py-2.5 border border-gray-600 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 bg-gray-700 text-white placeholder-gray-400 resize-none"
                            placeholder="Any special requests or notes for your appointment...">{{ old('notes') }}</textarea>
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    class="w-full flex justify-center items-center py-3 px-6 border border-transparent rounded-lg shadow-lg text-base font-semibold text-white bg-gradient-to-r from-amber-500 to-orange-600 hover:from-amber-600 hover:to-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500 focus:ring-offset-gray-800 transition-all duration-200 transform hover:scale-[1.01] active:scale-[0.99]">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                        </path>
                    </svg>
                    Book My Appointment
                </button>
            </form>
        </div>
    </div>
</x-guest-layout>
