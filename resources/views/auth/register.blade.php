{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

     

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

@extends('layouts.auth-pages')

@section('content')
    <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0 row">
                {{-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> --}}
                <div class="col-lg-6 d-none d-lg-block" 
                    style="background-image: url('img/listing-picture.jpg'); background-position: center; background-size: cover; background-repeat: no-repeat; display: flex;">
                </div>
                <div class="col-lg-6">
                    <div class="p-5">
                        <div class="text-center">
                        <a href="{{url('/')}}" class="h4 text-gray-900 mb-4" data-aos="zoom-in" style="text-decoration: none;"><h3>Register</h3></a>
                         </div>
                            {{-- <h1 class="h4 text-gray-900 mb-4" data-aos="zoom-in">Login!</h1> --}}
                     
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                        
                                <!-- Name -->
                                <div class="form-group">
                                    <x-input-label for="name" :value="__('Name')" />
                                    <x-text-input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>
                        
                             
                        
                                <!-- Email Address -->
                                <div class="mt-4">
                                    <x-input-label for="email" :value="__('Email')" />
                                    <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autocomplete="username" />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>
                        
                                <!-- Password -->
                                <div class="mt-4">
                                    <x-input-label for="password" :value="__('Password')" />
                        
                                    <x-text-input id="password" class="form-control"
                                                    type="password"
                                                    name="password"
                                                    required autocomplete="new-password" />
                        
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>
                        
                                <!-- Confirm Password -->
                                <div class="mt-4">
                                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                        
                                    <x-text-input id="password_confirmation" class="form-control block"
                                                    type="password"
                                                    name="password_confirmation" required autocomplete="new-password" />
                        
                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                </div>
                        
                                <div class="flex items-center justify-end mt-4">
                                    <a class="underline text-sm text-primary-600 dark:text-primary-400 hover:text-primary-900 dark:hover:text-primary-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-primary-800" href="{{ route('login') }}">
                                        {{ __('Already registered?') }}
                                    </a>
                        
                                    <x-primary-button class="btn btn-primary ms-4">
                                        {{ __('Register') }}
                                    </x-primary-button>
                                </div>
                            </form>
                        {{-- <a href="{{ route('register') }}" style="border-radius: 30px;" class="btn btn-primary btn-user btn-block mt-2" >Register</a> --}}
                        <hr>
                        <div class="text-center">
                            <a class="small" href="{{ route('password.request')}}">Forgot Password?</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection