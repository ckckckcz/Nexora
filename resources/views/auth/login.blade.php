@extends('layouts.auth')
@section('auth')
<div class="flex flex-col md:flex-row min-h-screen">
    <!-- Login Form Section -->
    <div class="w-full md:w-1/2 p-8 md:p-12 lg:p-16 flex items-center justify-center">
        <div class="w-full max-w-2xl">
            <div class="mb-12 transform transition duration-500">
                <h1 class="text-4xl font-bold mb-3 text-gray-800 relative inline-block">
                    Let's Sign you in
                    <div class="absolute -bottom-1 left-0 w-1/2 h-1 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full"></div>
                </h1>
                <p class="text-gray-600 text-lg">
                    You don't have an account? 
                    <a href="/daftar" class="text-blue-600 hover:text-blue-800 font-medium relative inline-block group">
                        sign up
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-gradient-to-r from-blue-500 to-purple-500 group-hover:w-full transition-all duration-300 ease-in-out"></span>
                    </a>
                </p>
            </div>
            
            <form method="POST" action="/login" class="space-y-8">
                @csrf
                <div class="form-floating-group">
                    <div class="relative">
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                            class="peer w-full px-4 pt-8 pb-3 bg-gray-50/30 backdrop-blur-sm rounded-xl border border-gray-200 text-gray-800 placeholder-transparent focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-300"
                            placeholder="Email">
                        <label for="email" 
                            class="absolute left-4 top-4 text-gray-500 text-sm transition-all duration-300 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-placeholder-shown:top-6 peer-focus:top-4 peer-focus:text-blue-600 peer-focus:text-sm">
                            Email Address
                        </label>
                        <div class="absolute right-4 top-6 text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                            </svg>
                        </div>
                    </div>
                    @error('email')
                        <p class="text-red-500 text-sm mt-1 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="form-floating-group">
                    <div class="relative">
                        <input id="password" type="password" name="password" required
                            class="peer w-full px-4 pt-8 pb-3 bg-gray-50/30 backdrop-blur-sm rounded-xl border border-gray-200 text-gray-800 placeholder-transparent focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-300"
                            placeholder="Password">
                        <label for="password" 
                            class="absolute left-4 top-4 text-gray-500 text-sm transition-all duration-300 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-placeholder-shown:top-6 peer-focus:top-4 peer-focus:text-blue-600 peer-focus:text-sm">
                            Password
                        </label>
                        <button type="button" id="togglePassword" class="absolute right-4 top-6 text-gray-400 hover:text-gray-600 focus:outline-none transition-colors duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" id="eyeIcon">
                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hidden" viewBox="0 0 20 20" fill="currentColor" id="eyeOffIcon">
                                <path fill-rule="evenodd" d="M3.707 2.293a1 1 0 00-1.414 1.414l14 14a1 1 0 001.414-1.414l-1.473-1.473A10.014 10.014 0 0019.542 10C18.268 5.943 14.478 3 10 3a9.958 9.958 0 00-4.512 1.074l-1.78-1.781zm4.261 4.26l1.514 1.515a2.003 2.003 0 012.45 2.45l1.514 1.514a4 4 0 00-5.478-5.478z" clip-rule="evenodd" />
                                <path d="M12.454 16.697L9.75 13.992a4 4 0 01-3.742-3.741L2.335 6.578A9.98 9.98 0 00.458 10c1.274 4.057 5.065 7 9.542 7 .847 0 1.669-.105 2.454-.303z" />
                            </svg>
                        </button>
                    </div>
                    @error('password')
                        <p class="text-red-500 text-sm mt-1 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember_me" type="checkbox" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded transition duration-150 ease-in-out">
                        <label for="remember_me" class="ml-2 block text-sm text-gray-700">Remember me</label>
                    </div>
                    <a href="/forgot" class="text-sm text-blue-600 hover:text-blue-800 font-medium transition-colors duration-200 relative inline-block group">
                        Forgot password?
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-gradient-to-r from-blue-500 to-purple-500 group-hover:w-full transition-all duration-300 ease-in-out"></span>
                    </a>
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-medium py-4 px-6 rounded-xl transition-all duration-300 transform hover:-translate-y-1 hover:shadow-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 flex items-center justify-center group">
                        <span class="mr-2">SIGN IN</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transform transition-transform duration-300 group-hover:translate-x-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            </form>
            
            <div class="relative my-10">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-gray-300"></div>
                </div>
                <div class="relative flex justify-center text-sm">
                    <span class="px-4 py-1 bg-white text-gray-500 rounded-full shadow-sm">Or continue with</span>
                </div>
            </div>
            
            <div class="grid grid-cols-2 gap-4">
                <button class="flex items-center justify-center py-3 px-4 border border-gray-200 rounded-xl shadow-sm bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 transition-all duration-300 transform hover:scale-[1.02] hover:shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 group">
                    <svg class="h-5 w-5 mr-2 transition-transform duration-300 group-hover:scale-110" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M22.56 12.25C22.56 11.47 22.49 10.72 22.36 10H12V14.26H17.92C17.66 15.63 16.88 16.79 15.71 17.57V20.34H19.28C21.36 18.42 22.56 15.6 22.56 12.25Z" fill="#4285F4"/>
                        <path d="M12 23C14.97 23 17.46 22.02 19.28 20.34L15.71 17.57C14.73 18.23 13.48 18.63 12 18.63C9.13 18.63 6.72 16.69 5.82 14.09H2.12V16.95C3.94 20.53 7.69 23 12 23Z" fill="#34A853"/>
                        <path d="M5.82 14.09C5.58 13.43 5.44 12.73 5.44 12C5.44 11.27 5.58 10.57 5.82 9.91V7.05H2.12C1.41 8.57 1 10.24 1 12C1 13.76 1.41 15.43 2.12 16.95L5.82 14.09Z" fill="#FBBC05"/>
                        <path d="M12 5.37C13.62 5.37 15.06 5.94 16.21 7.02L19.36 3.87C17.45 2.09 14.97 1 12 1C7.69 1 3.94 3.47 2.12 7.05L5.82 9.91C6.72 7.31 9.13 5.37 12 5.37Z" fill="#EA4335"/>
                    </svg>
                    <span class="transition-transform duration-300 group-hover:translate-x-1">Google</span>
                </button>
                <button class="flex items-center justify-center py-3 px-4 border border-gray-200 rounded-xl shadow-sm bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 transition-all duration-300 transform hover:scale-[1.02] hover:shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 group">
                    <svg class="h-5 w-5 mr-2 text-[#1877F2] transition-transform duration-300 group-hover:scale-110" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M24 12.073C24 5.40365 18.629 0 12 0C5.37097 0 0 5.40365 0 12.073C0 18.0988 4.38823 23.0935 10.125 24V15.563H7.07661V12.073H10.125V9.41306C10.125 6.38751 11.9153 4.71627 14.6574 4.71627C15.9706 4.71627 17.3439 4.95189 17.3439 4.95189V7.92146H15.8303C14.34 7.92146 13.875 8.85225 13.875 9.8069V12.073H17.2031L16.6708 15.563H13.875V24C19.6118 23.0935 24 18.0988 24 12.073Z"/>
                    </svg>
                    <span class="transition-transform duration-300 group-hover:translate-x-1">Facebook</span>
                </button>
            </div>
            
            <p class="text-center text-gray-600 text-sm mt-10 transition-opacity duration-300 hover:opacity-80">
                By joining you agree to the System logo LMS<br>
                <a href="#" class="text-blue-600 hover:text-blue-800 transition-colors duration-200 underline-offset-2 hover:underline">Terms of service</a> and 
                <a href="#" class="text-blue-600 hover:text-blue-800 transition-colors duration-200 underline-offset-2 hover:underline">Privacy Policy</a>
            </p>
        </div>
    </div>
    @include('components.ui.authPortal')
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Password toggle functionality
        const togglePassword = document.getElementById('togglePassword');
        const password = document.getElementById('password');
        const eyeIcon = document.getElementById('eyeIcon');
        const eyeOffIcon = document.getElementById('eyeOffIcon');
        
        togglePassword.addEventListener('click', function() {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            
            // Toggle eye icons
            eyeIcon.classList.toggle('hidden');
            eyeOffIcon.classList.toggle('hidden');
        });
        
        // Input label animation
        const inputs = document.querySelectorAll('input');
        
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                const label = this.previousElementSibling;
                if (label && label.tagName === 'LABEL') {
                    label.classList.add('text-blue-500', 'transform', 'scale-95');
                }
            });
            
            input.addEventListener('blur', function() {
                const label = this.previousElementSibling;
                if (label && label.tagName === 'LABEL') {
                    if (!this.value) {
                        label.classList.remove('text-blue-500', 'transform', 'scale-95');
                    }
                }
            });
            
            // Check initial state (for autofilled inputs)
            if (input.value) {
                const label = input.previousElementSibling;
                if (label && label.tagName === 'LABEL') {
                    label.classList.add('text-blue-500', 'transform', 'scale-95');
                }
            }
        });
    });
</script>
@endsection