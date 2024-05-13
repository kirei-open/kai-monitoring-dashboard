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

<nav id="nav" class="bg-white z-10 fixed top-0 flex-no-wrap w-full py-2 dark:bg-gray-900">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-30 lg:mx-[12.5rem] lg:mt-[-20px] p-4">
        <a href="/landing" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{ URL::asset('img/logokai_main.png') }}" class="lg:ml-[-80px] lg:w-[320px]" alt="" />
        </a>
        <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-sticky" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                </svg>
                </button>
        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
            @if (auth()->user()->hasRole(['Admin']))
                <ul class="flex flex-col p-4 md:p-0 mt-2 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-[4.5rem] rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-transparent dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700 whitespace-nowrap md:ml-[400px] md:mt-[-60px]">
                        <li style="font-family: 'DM Sans', sans-serif;" class="{{ Request::is('landing') ? 'text-[#2596be] font-bold' : 'dark:text-white'}} hover:text-[#2596be] hover:font-bold lg:text-[16px] text-[13px]">
                            <a href="/landing">Home</a>
                        </li>
                        <li style="font-family: 'DM Sans', sans-serif;" class="{{ Request::is('table') ? 'text-[#2596be] font-bold' : 'dark:text-white'}} hover:text-[#2596be] hover:font-bold lg:text-[16px] text-[13px]">
                            <a wire:navigate href="/table">Table</a>
                        </li>
                        <li style="font-family: 'DM Sans', sans-serif;" class="{{ Request::is('graphic') ? 'text-[#2596be] font-bold' : 'dark:text-white'}} hover:text-[#2596be] hover:font-bold lg:text-[16px] text-[13px]">
                            <a wire:navgate href="/graphic">Graphic</a>
                        </li>
                        <li style="font-family: 'DM Sans', sans-serif;" class="{{ Request::is('logger') ? 'text-[#2596be] font-bold' : 'dark:text-white'}} hover:text-[#2596be] hover:font-bold lg:text-[16px] text-[13px]">
                            <a wire:navgate href="/logger">Event Logger</a>
                        </li>
                        <li style="font-family: 'DM Sans', sans-serif;" class="{{ Request::is('report') ? 'text-[#2596be] font-bold' : 'dark:text-white'}} hover:text-[#2596be] hover:font-bold lg:text-[16px] text-[13px]">
                            <a wire:navigate href="/report">Report</a>
                        </li>
                        <li style="font-family: 'DM Sans', sans-serif;" class="{{ Request::is('asset') ? 'text-[#2596be] font-bold' : 'dark:text-white'}} hover:text-[#2596be] hover:font-bold lg:text-[16px] text-[13px]">
                            <a wire:navigate href="/asset">Asset</a>
                        </li>
                    <li class="lg:mt-[-10px]">
                        <button id="theme-toggle" type="button" class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5 ml-[200px]">
                            <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                            <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
                        </button>
                    </li>
                    <li class="lg:mt-[-12px] lg:ml-[200px]">
                        <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-black dark:text-white bg-transparent hover:bg-transparent focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-transparent dark:hover:bg-transparent dark:focus:ring-blue-800 lg:ml-[-50px]" type="button">
                            <img class="w-8 h-8 rounded-full mr-3" src="{{ asset('img/avatar-2.png') }}" alt="user photo">
                            <div style="font-family: 'DM Sans', sans-serif;" class="lg:text-[16px] text-[13px] hover:text-[#193766] hover:font-bold" x-data="{ name: '{{ ucfirst(auth()->user()->name) }}' }" x-text="name" x-on:profile-updated.window="name = $event.detail.name">
                            </div>
                            <svg class="w-2.5 h-2.5 ml-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                            </svg>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-30 dark:bg-gray-700">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                                <li>
                                    <button wire:click="logout" class="px-12 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                        <h6 style="font-family: 'DM Sans', sans-serif;" class="lg:ml-[-30px]">{{ __('Log Out') }}</h6>
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            @endif
            @if (auth()->user()->hasRole(['Teknisi']))
                <ul class="flex flex-col p-4 md:p-0 mt-2 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-[4.5rem] rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-transparent dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700 whitespace-nowrap md:ml-[550px] md:mt-[-60px]">
                    <li style="font-family: 'DM Sans', sans-serif;" class="{{ Request::is('graphic') ? 'text-[#2596be] font-bold' : 'dark:text-white'}} hover:text-[#2596be] hover:font-bold lg:text-[16px] text-[13px]">
                        <a wire:navgate href="/graphic">Graphic</a>
                    </li>
                    <li style="font-family: 'DM Sans', sans-serif;" class="{{ Request::is('logger') ? 'text-[#2596be] font-bold' : 'dark:text-white'}} hover:text-[#2596be] hover:font-bold lg:text-[16px] text-[13px]">
                        <a wire:navgate href="/logger">Event Logger</a>
                    </li>
                    <li style="font-family: 'DM Sans', sans-serif;" class="{{ Request::is('report') ? 'text-[#2596be] font-bold' : 'dark:text-white'}} hover:text-[#2596be] hover:font-bold lg:text-[16px] text-[13px]">
                        <a wire:navigate href="/report">Report</a>
                    </li>
                    <li class="lg:mt-[-10px]">
                        <button id="theme-toggle" type="button" class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5 ml-[400px]">
                            <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                            <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
                        </button>
                    </li>
                    <li class="lg:mt-[-12px] lg:ml-[200px]">
                        <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-black dark:text-white bg-transparent hover:bg-transparent focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-transparent dark:hover:bg-transparent dark:focus:ring-blue-800 lg:ml-[-50px]" type="button">
                            <img class="w-8 h-8 rounded-full mr-3" src="{{ asset('img/avatar-5.png') }}" alt="user photo">
                            <div style="font-family: 'DM Sans', sans-serif;" class="lg:text-[16px] text-[13px] hover:text-[#193766] hover:font-bold" x-data="{ name: '{{ ucfirst(auth()->user()->name) }}' }" x-text="name" x-on:profile-updated.window="name = $event.detail.name">
                            </div>
                            <svg class="w-2.5 h-2.5 ml-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                            </svg>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-30 dark:bg-gray-700">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                                <li>
                                    <button wire:click="logout" class="px-12 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                        <h6 style="font-family: 'DM Sans', sans-serif;" class="lg:ml-[-30px]">{{ __('Log Out') }}</h6>
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            @endif
            @if (auth()->user()->hasRole(['super_admin']))
                <ul class="flex flex-col p-4 md:p-0 mt-2 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-[4.5rem] rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-transparent dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700 whitespace-nowrap md:ml-[400px] md:mt-[-60px]">
                        <li style="font-family: 'DM Sans', sans-serif;" class="{{ Request::is('landing') ? 'text-[#2596be] font-bold' : 'dark:text-white'}} hover:text-[#2596be] hover:font-bold lg:text-[16px] text-[13px]">
                            <a href="/landing">Home</a>
                        </li>
                        <li style="font-family: 'DM Sans', sans-serif;" class="{{ Request::is('table') ? 'text-[#2596be] font-bold' : 'dark:text-white'}} hover:text-[#2596be] hover:font-bold lg:text-[16px] text-[13px]">
                            <a wire:navigate href="/table">Table</a>
                        </li>
                        <li style="font-family: 'DM Sans', sans-serif;" class="{{ Request::is('graphic') ? 'text-[#2596be] font-bold' : 'dark:text-white'}} hover:text-[#2596be] hover:font-bold lg:text-[16px] text-[13px]">
                            <a wire:navgate href="/graphic">Graphic</a>
                        </li>
                        <li style="font-family: 'DM Sans', sans-serif;" class="{{ Request::is('logger') ? 'text-[#2596be] font-bold' : 'dark:text-white'}} hover:text-[#2596be] hover:font-bold lg:text-[16px] text-[13px]">
                            <a wire:navgate href="/logger">Event Logger</a>
                        </li>
                        <li style="font-family: 'DM Sans', sans-serif;" class="{{ Request::is('report') ? 'text-[#2596be] font-bold' : 'dark:text-white'}} hover:text-[#2596be] hover:font-bold lg:text-[16px] text-[13px]">
                            <a wire:navigate href="/report">Report</a>
                        </li>
                        <li style="font-family: 'DM Sans', sans-serif;" class="{{ Request::is('asset') ? 'text-[#2596be] font-bold' : 'dark:text-white'}} hover:text-[#2596be] hover:font-bold lg:text-[16px] text-[13px]">
                            <a wire:navigate href="/asset">Asset</a>
                        </li>
                    <li class="lg:mt-[-10px]">
                        <button id="theme-toggle" type="button" class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5 lg:ml-[200px] ml-[-15px]">
                            <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                            <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
                        </button>
                    </li>
                    <li class="lg:mt-[-12px] lg:ml-[200px] ml-[-20px]">
                        <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-black dark:text-white bg-transparent hover:bg-transparent focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-transparent dark:hover:bg-transparent dark:focus:ring-blue-800 lg:ml-[-50px]" type="button">
                            <img class="w-8 h-8 rounded-full mr-3" src="{{ asset('img/avatar-1.png') }}" alt="user photo">
                            <div style="font-family: 'DM Sans', sans-serif;" class="lg:text-[16px] text-[13px] hover:text-[#193766] hover:font-bold" x-data="{ name: '{{ ucfirst(auth()->user()->name) }}' }" x-text="name" x-on:profile-updated.window="name = $event.detail.name">
                            </div>
                            <svg class="w-2.5 h-2.5 ml-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                            </svg>
                        </button>                        
                        <!-- Dropdown menu -->
                        <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-30 dark:bg-gray-700">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                                <li>
                                    <x-dropdown-link :href="route('filament.admin.auth.login')" class="px-12 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white dark:text-white text-black">
                                        <h6 style="font-family: 'DM Sans', sans-serif;">Admin Panel</h6>
                                    </x-dropdown-link>
                                </li>
                                <li>
                                    <button wire:click="logout" class="px-12 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                        <h6 style="font-family: 'DM Sans', sans-serif;" class="lg:ml-[-30px]">{{ __('Log Out') }}</h6>
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            @endif
        </div>
    </div>
</nav>