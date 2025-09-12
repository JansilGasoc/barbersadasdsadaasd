<x-guest-layout>
    <script>
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ session('success') }}',
                confirmButtonColor: '#10b981', // Emerald 500
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
                confirmButtonColor: '#ef4444', // Red 500
            });
        @endif
    </script>

    <div class="max-w-3xl mx-auto">
        <!-- Header Section -->
        <div class="text-center">
            <div
                class="mx-auto h-20 w-20 bg-gradient-to-r from-amber-500 to-orange-600 rounded-full flex items-center justify-center shadow-lg mb-4">
                <svg class="h-10 w-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                    </path>
                </svg>
            </div>
            <h1 class="text-4xl font-bold text-gray-300 mb-2">Book Your Appointment</h1>
            <p class="text-lg text-gray-600 dark:text-gray-400">Schedule your visit with Benz Mercader</p>
        </div>

        <!-- Main Form Card -->
        <div class="bg-gray-800 shadow-2xl rounded-2xl p-8 border border-gray-200">
            <form action="{{ route('appointment.create') }}" method="POST" class="space-y-8">
                @csrf

                <!-- Personal Information Section -->
                <div class="border-b border-gray-200 border-gray-700 pb-6">
                    <h2 class="text-xl font-semibold text-white mb-6 flex items-center">
                        <svg class="h-5 w-5 text-amber-500 mr-2" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        Personal Information
                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-1 gap-6">
                        <!-- Name -->
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-gray-300">Full Name</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                        </path>
                                    </svg>
                                </div>
                                <input type="text" name="customer_name" value="{{ old('customer_name') }}"
                                    class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 bg-gray-700 dark:border-gray-600 text-white transition-all duration-200 hover:border-gray-400 dark:hover:border-gray-500"
                                    placeholder="Enter your full name" required>
                            </div>
                            @error('customer_name')
                                <p class="text-red-500 text-sm mt-1 flex items-center">
                                    <svg class="h-4 w-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Phone -->
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-gray-300">Phone Number</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                        </path>
                                    </svg>
                                </div>
                                <input type="text" name="customer_phone" value="{{ old('customer_phone') }}"
                                    class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 bg-gray-700 text-white transition-all duration-200 hover:border-gray-400 dark:hover:border-gray-500"
                                    placeholder="Enter your phone number (11 digits)" inputmode="numeric"
                                    pattern="^\d{11}$" minlength="11" maxlength="11" required>
                            </div>
                            @error('customer_phone')
                                <p class="text-red-500 text-sm mt-1 flex items-center">
                                    <svg class="h-4 w-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Service Selection Section -->
                <div class="border-b border-gray-700 pb-6">
                    <h2 class="text-xl font-semibold text-white mb-6 flex items-center">
                        <svg class="h-5 w-5 text-amber-500 mr-2" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z">
                            </path>
                        </svg>
                        Service Selection
                    </h2>

                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-300">Choose Your Service</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                                    </path>
                                </svg>
                            </div>
                            <select name="service"
                                class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 bg-gray-700 dark:border-gray-600 text-white transition-all duration-200 hover:border-gray-400 dark:hover:border-gray-500"
                                required>
                                <option value="" disabled selected>-- Select a service --</option>
                                <option value="Low Taper Fade"> Low Taper Fade – ₱50</option>
                                <option value="Army Cut"> Army Cut – ₱50</option>
                                <option value="Buzz Cut"> Buzz Cut – ₱60</option>
                                <option value="Burst Fade"> Burst Fade – ₱50</option>
                                <option value="Low Taper Mullet"> Low Taper Mullet – ₱60</option>
                                <option value="Mullet Fade"> Mullet Fade – ₱60</option>
                                <option value="Curly Blowout Taper"> Curly Blowout Taper – ₱60</option>
                                <option value="Blowout Taper"> Blowout Taper – ₱60</option>
                                <option value="Angular Fringe"> Angular Fringe – ₱60</option>
                            </select>
                        </div>
                        @error('service')
                            <p class="text-red-500 text-sm mt-1 flex items-center">
                                <svg class="h-4 w-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>

                <!-- Date & Time Section -->
                <div class="border-b border-gray-200 dark:border-gray-700 pb-6">
                    <h2 class="text-xl font-semibold text-gray-100 mb-6 flex items-center">
                        <svg class="h-5 w-5 text-amber-500 mr-2" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Schedule Your Visit
                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-1 gap-6">
                        <!-- Date -->
                        <div class="space-y-2">
                            <label for="appointment_date" class="block text-sm font-medium text-gray-300">Preferred
                                Date</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                </div>
                                <input type="date" name="appointment_date" value="{{ old('appointment_date') }}"
                                    min="{{ date('Y-m-d') }}"
                                    class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 bg-gray-700 text-white transition-all duration-200 hover:border-gray-400 dark:hover:border-gray-500"
                                    required>
                            </div>
                            @error('appointment_date')
                                <p class="text-red-500 text-sm mt-1 flex items-center">
                                    <svg class="h-4 w-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Time -->
                        <div class="space-y-2">
                            <label for="appointment_time" class="block text-sm font-medium text-gray-300">Preferred
                                Time</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <select name="appointment_time" id="appointment_time"
                                    class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg 
                       focus:ring-2 focus:ring-amber-500 focus:border-amber-500 
                       bg-gray-700 dark:border-gray-600 text-white 
                       transition-all duration-200 hover:border-gray-400 dark:hover:border-gray-500"
                                    required>
                                    @for ($hour = 7; $hour <= 18; $hour++)
                                        <option value="{{ sprintf('%02d:00', $hour) }}">
                                            {{ date('h:i A', strtotime(sprintf('%02d:00', $hour))) }}
                                        </option>
                                        <option value="{{ sprintf('%02d:30', $hour) }}">
                                            {{ date('h:i A', strtotime(sprintf('%02d:30', $hour))) }}
                                        </option>
                                    @endfor
                                </select>
                            </div>
                            @error('appointment_time')
                                <p class="text-red-500 text-sm mt-1 flex items-center">
                                    <svg class="h-4 w-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>

                    <!-- Business Hours Info -->
                    <div
                        class="mt-4 p-4 bg-amber-50 bg-amber-900/20 rounded-lg border border-amber-200 dark:border-amber-800">
                        <p class="text-sm text-amber-200 flex items-center">
                            <svg class="h-4 w-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <strong>Business Hours:</strong> Monday - Sunday, 7:00 AM - 7:00 PM
                        </p>
                    </div>
                </div>

                <!-- Additional Notes Section -->
                <div>
                    <h2 class="text-xl font-semibold text-gray-300 dark:text-white mb-6 flex items-center">
                        <svg class="h-5 w-5 text-amber-500 mr-2" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                            </path>
                        </svg>
                        Additional Notes
                    </h2>

                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-300">Special Requests or Notes
                            (Optional)</label>
                        <textarea name="notes" rows="4"
                            class="block w-full px-3 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 bg-gray-700 dark:border-gray-600 text-white transition-all duration-200 hover:border-gray-400 dark:hover:border-gray-500 resize-none"
                            placeholder="Any special requests or notes for your appointment...">{{ old('notes') }}</textarea>
                    </div>
                </div>
                <!-- Submit Button -->
                <div class="pt-6">
                    <button type="submit"
                        class="w-full flex justify-center items-center py-4 px-6 border border-transparent rounded-xl shadow-lg text-lg font-semibold text-white bg-gradient-to-r from-amber-500 to-orange-600 hover:from-amber-600 hover:to-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500 dark:focus:ring-offset-gray-800 transition-all duration-200 transform hover:scale-[1.02] active:scale-[0.98]">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                        Book My Appointment
                    </button>
                </div>
            </form>
        </div>

    </div>
    </div>
</x-guest-layout>
