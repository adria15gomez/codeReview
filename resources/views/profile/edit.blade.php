@extends('layouts.coder')

@section('content')
    <section class="flex justify-center">
        <x-app-layout>
            <img src="img\coder\misevaluaciones.svg" class="h-50 mx-auto md:h-80 lg:h-80 xl:h-80" alt="Mi perfil" />
            <x-slot name="header">
                <h2 class="text-xl text-gray-800 leading-tight font-regular text-left mt-5 ml-10">
                    {{ __('Profile') }}
                </h2>
            </x-slot>

            <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 items-center">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </x-app-layout>
    </section>
@endsection
