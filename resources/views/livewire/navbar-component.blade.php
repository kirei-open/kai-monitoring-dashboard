<?php

use App\Livewire\Actions\Logout;
use App\Livewire\Forms\LogoutForm;
use Livewire\Volt\Component;

new class extends Component
{
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/login', navigate: true);
    }
}; ?>

<nav id="nav" class="z-10 fixed top-0 flex-no-wrap w-full py-2">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-30 lg:mx-[12.5rem] lg:mt-[-20px] p-4">
        <img src="{{ URL::asset('img/logokai_main.png') }}" class="lg:ml-[-80px]" alt="" />
        <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-sticky" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                </svg>
                </button>
        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
            <ul class="flex flex-col p-4 md:p-0 mt-2 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-[4.5rem] rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-transparent dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700 whitespace-nowrap md:ml-[250px] md:mt-[-60px]">
                <li style="font-family: 'DM Sans', sans-serif;" class="{{ Request::is('landing') ? 'text-[#2596be] font-bold' : ''}} hover:text-[#2596be] hover:font-bold lg:text-[16px] text-[13px]">
                    <a href="/landing" class="block py-2 px-3 text-black bg-gray-500 rounded-full md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500" aria-current="page">Home</a>
                </li>
                <li style="font-family: 'DM Sans', sans-serif;" class="{{ Request::is('table') ? 'text-[#2596be] font-bold' : ''}} hover:text-[#2596be] hover:font-bold lg:text-[16px] text-[13px]">
                    <a wire:navigate href="/table" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Table</a>
                </li>
                <li style="font-family: 'DM Sans', sans-serif;" class="{{ Request::is('graphic') ? 'text-[#2596be] font-bold' : ''}} hover:text-[#2596be] hover:font-bold lg:text-[16px] text-[13px]">
                    <a wire:navgate href="/graphic" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Graphic</a>
                </li>
                <li style="font-family: 'DM Sans', sans-serif;" class="{{ Request::is('event-logger') ? 'text-[#2596be] font-bold' : ''}} hover:text-[#2596be] hover:font-bold lg:text-[16px] text-[13px]">
                    <a wire:navigate href="/logger" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Event Logger</a>
                </li>
                <li style="font-family: 'DM Sans', sans-serif;" class="{{ Request::is('voice-logger') ? 'text-[#2596be] font-bold' : ''}} hover:text-[#2596be] hover:font-bold lg:text-[16px] text-[13px]">
                    <a wire:navigate href="/voice" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Voice Logger</a>
                </li>
                <li style="font-family: 'DM Sans', sans-serif;" class="{{ Request::is('report') ? 'text-[#2596be] font-bold' : ''}} hover:text-[#2596be] hover:font-bold lg:text-[16px] text-[13px]">
                    <a wire:navigate href="/report" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Report</a>
                </li>
                <li style="font-family: 'DM Sans', sans-serif;" class="{{ Request::is('asset') ? 'text-[#2596be] font-bold' : ''}} hover:text-[#2596be] hover:font-bold lg:text-[16px] text-[13px]">
                    <a wire:navigate href="/asset" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Asset</a>
                <li style="font-family: 'DM Sans', sans-serif;" class="{{ Request::is('#') ? 'text-[#193766] font-bold' : ''}} hover:text-[#193766] hover:font-bold lg:text-[16px] text-[13px]">
                    <a href="#">Search</a>
                </li>
                @auth
                <li style="font-family: 'DM Sans', sans-serif;" class="lg:mt-[-5px] lg:ml-[200px]">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150 ml-[-12px]">
                                <div style="font-family: 'DM Sans', sans-serif;" class="lg:text-[16px] text-[13px] hover:text-[#193766] hover:font-bold" x-data="{ name: '{{ ucfirst(auth()->user()->name) }}' }" x-text="name" x-on:profile-updated.window="name = $event.detail.name"></div>
    
                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>
    
                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile')" wire:navigate>
                                {{ __('Profile') }}
                            </x-dropdown-link>
    
                            <!-- Authentication -->
                            <button wire:click="logout" class="w-full text-start">
                                <x-dropdown-link>
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </button>
                        </x-slot>
                    </x-dropdown>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>