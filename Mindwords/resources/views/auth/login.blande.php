
<x-guest-layout>
    <div class="login-wrapper">
        <!-- Máy bay giấy decorative -->
        <div class="plane-decoration">
            <svg class="paper-plane" viewBox="0 0 100 100">
                <path d="M10,50 L90,20 L50,45 L90,80 L10,50 L50,45 Z" fill="#5678c9"/>
            </svg>
        </div>

        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold text-blue-900 tracking-wider">ĐĂNG NHẬP</h2>
        </div>

        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
            <div>
                <x-input-label for="email" :value="__('Email hoặc tài khoản')" />
                <div class="relative mt-1">
                    <span class="absolute left-3 top-3 text-gray-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </span>
                    <x-text-input id="email" 
                        class="block w-full pl-10" 
                        type="email" 
                        name="email" 
                        :value="old('email')" 
                        required 
                        autofocus 
                        placeholder="Nhập tài khoản hoặc email" />
                </div>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Mật khẩu')" />
                <div class="relative mt-1">
                    <span class="absolute left-3 top-3 text-gray-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </span>
                    <x-text-input id="password" 
                        class="block w-full pl-10 pr-10"
                        type="password"
                        name="password"
                        required 
                        placeholder="Nhập mật khẩu" />
                    <button type="button" 
                        onclick="togglePassword()" 
                        class="absolute right-3 top-3 text-gray-400 hover:text-gray-600">
                        <svg id="eye-icon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </button>
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Options -->
            <div class="flex items-center justify-between mt-4">
                @if (Route::has('password.request'))
                    <a class="text-sm text-blue-900 hover:text-blue-700 font-medium" 
                       href="{{ route('password.request') }}">
                        {{ __('Quên mật khẩu') }}
                    </a>
                @endif

                <a href="#" class="text-sm text-blue-900 hover:text-blue-700 font-medium flex items-center gap-1">
                    <span class="inline-flex items-center justify-center w-4 h-4 text-xs border-2 border-blue-900 rounded-full">?</span>
                    Trợ giúp!
                </a>
            </div>

            <!-- Submit Button -->
            <div class="mt-6">
                <x-primary-button class="w-full justify-center py-3 bg-blue-900 hover:bg-blue-800">
                    {{ __('ĐĂNG NHẬP') }}
                </x-primary-button>
            </div>

            <!-- Divider -->
            <div class="relative my-6">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-gray-300"></div>
                </div>
                <div class="relative flex justify-center text-sm">
                    <span class="px-4 bg-white text-gray-500">Hoặc đăng nhập</span>
                </div>
            </div>

            <!-- Register Link -->
            @if (Route::has('register'))
                <a href="{{ route('register') }}" 
                   class="block w-full text-center py-3 border-2 border-blue-900 rounded-lg text-blue-900 font-semibold hover:bg-blue-900 hover:text-white transition-colors">
                    Đăng ký
                </a>
            @endif
        </form>
    </div>

    @push('styles')
        <style>
            .login-wrapper {
                position: relative;
            }
            .plane-decoration {
                position: absolute;
                top: -40px;
                right: 20px;
                animation: fly 2s ease-in-out infinite;
            }
            .paper-plane {
                width: 60px;
                height: 60px;
            }
            @keyframes fly {
                0%, 100% { transform: translate(0, 0) rotate(-15deg); }
                50% { transform: translate(10px, -10px) rotate(-10deg); }
            }
        </style>
    @endpush

    @push('scripts')
        <script>
            function togglePassword() {
                const passwordInput = document.getElementById('password');
                const eyeIcon = document.getElementById('eye-icon');
                
                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    eyeIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>';
                } else {
                    passwordInput.type = 'password';
                    eyeIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />';
                }
            }
        </script>
    @endpush
</x-guest-layout>