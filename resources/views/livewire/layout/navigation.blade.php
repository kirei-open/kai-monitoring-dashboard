<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component {
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
}; ?>


<nav id="nav" class="bg-white z-10 fixed top-0 flex-no-wrap w-full py-2 dark:bg-gray-900">
  <style>
    .dropdown .dropbtn {
      font-size: 16px;  
      border: none;
      outline: none;
      color: white;
      padding: 14px 16px;
      background-color: inherit;
      font-family: inherit;
      margin: 0;
    }

    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f9f9f9;
      min-width: 100px;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      z-index: 1;
      margin-left: -50px;
    }

    .dropdown-content a {
      float: none;
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
      text-align: left;
    }

    .dropdown-content a:hover {
      background-color: #ddd;
    }

    .dropdown:hover .dropdown-content {
      display: block;
    }
  </style>
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-30 lg:mx-[12.5rem] lg:mt-[-20px] p-4">
    <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
      <img src="{{ URL::asset('img/logokai_main.png') }}" class="lg:ml-[-80px] lg:w-[320px]" alt="" />
    </a>
    <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
      <button data-collapse-toggle="navbar-sticky" type="button"
        class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg 
              md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 
              dark:hover:bg-gray-700 dark:focus:ring-gray-600"
        aria-controls="navbar-sticky" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M1 1h15M1 7h15M1 13h15" />
        </svg>
      </button>
    </div>
    <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
      @if (auth()->user()->hasRole(['Teknisi']))
        <ul
          class="flex flex-col p-4 md:p-0 mt-2 font-medium border border-gray-100 rounded-lg bg-gray-50 
            md:space-x-[4.5rem] rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-transparent 
            dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700 whitespace-nowrap 
            lg:ml-[500px] md:mt-[-60px] lg:mt-[-75px]">
          <li
            class="{{ Request::is('graphic')
                ? 'bg-blue-100 text-blue-800 font-medium dark:bg-blue-900 
                                                              dark:text-blue-300'
                : 'dark:text-white' }} text-[16px] px-4 py-3 rounded-full hover:bg-blue-100 
              hover:text-blue-800 hover:dark:bg-blue-900 
              hover:dark:text-blue-300">
            <a href="{{ route('graphic') }}" wire:navigate>@lang('messages.historical data')</a>
          </li>
          <li
            class="{{ Request::is('#')
                ? 'bg-blue-100 text-blue-800 font-medium dark:bg-blue-900 
                                                              dark:text-blue-300'
                : 'dark:text-white' }} text-[16px] px-4 py-3 rounded-full hover:bg-blue-100 
              hover:text-blue-800 hover:dark:bg-blue-900 
              hover:dark:text-blue-300">
            <a href="#" wire:navigate>@lang('messages.event logger')</a>
          </li>
          <li
            class="{{ Request::is('#')
                ? 'bg-blue-100 text-blue-800 font-medium dark:bg-blue-900 
                                                              dark:text-blue-300'
                : 'dark:text-white' }} text-[16px] px-4 py-3 rounded-full hover:bg-blue-100 
              hover:text-blue-800 hover:dark:bg-blue-900 
              hover:dark:text-blue-300">
            <a href="#" wire:navigate>@lang('messages.report')</a>
          </li>
          <li class="lg:mt-[2px]">
            <button id="theme-toggle" type="button"
              class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 
                    dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 
                    dark:focus:ring-gray-700 rounded-lg text-sm p-2.5 
                    lg:ml-[300px] ml-[3px]">
              <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
              </svg>
              <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1
                    1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0
                    11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011
                    1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414
                    1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4
                    11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd">
                </path>
              </svg>
            </button>
          </li>
          <li class="lg:mt-[-2px] lg:ml-[80px] ml-2">
            <x-dropdown align="right" width="48">
              <x-slot name="trigger">
                <button
                  class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 
                        font-medium rounded-md text-gray-500 dark:text-gray-400  hover:text-gray-700 
                        dark:hover:text-gray-300 focus:outline-none transition ease-in-out 
                        duration-150 ml-[-45px]">
                  <img class="w-8 h-8 rounded-full mr-3" src="{{ asset('img/avatar-5.png') }}" alt="user photo">
                  <div class="lg:text-[16px] text-[13px] hover:text-[#193766] hover:font-bold" x-data="{ name: '{{ ucfirst(auth()->user()->name) }}' }"
                    x-text="name" x-on:profile-updated.window="name = $event.detail.name">
                  </div>
                  <div class="ms-1">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                      <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414
                        0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                  </div>
                </button>
              </x-slot>
              <x-slot name="content">
                <!-- Authentication -->
                <button wire:click="logout" class="w-full text-start">
                  <x-dropdown-link>
                    @lang('messages.logout')
                  </x-dropdown-link>
                </button>
              </x-slot>
            </x-dropdown>
          </li>
        </ul>
      @endif
      @if (auth()->user()->hasRole(['super_admin']))
        <ul
          class="flex flex-col p-4 md:p-0 mt-2 font-medium border border-gray-100 rounded-lg 
            bg-gray-50 md:space-x-[4.5rem] rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 
            md:bg-transparent dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700 
            whitespace-nowrap lg:ml-[350px] md:mt-[-60px] lg:mt-[-75px]">
          <li
            class="{{ Request::is('dashboard')
                ? 'bg-blue-100 text-blue-800 font-medium dark:bg-blue-900 
                                                              dark:text-blue-300'
                : 'dark:text-white' }} text-[16px] px-4 py-3 rounded-full hover:bg-blue-100 
              hover:text-blue-800 hover:dark:bg-blue-900 hover:dark:text-blue-300">
            <a href="{{ route('dashboard') }}">@lang('messages.home')</a>
          </li>
          <li
            class="{{ Request::is('table')
                ? 'bg-blue-100 text-blue-800 font-medium dark:bg-blue-900 
                dark:text-blue-300'
                : 'dark:text-white' }} text-[16px] px-4 py-3 rounded-full hover:bg-blue-100 
              hover:text-blue-800 hover:dark:bg-blue-900 
              hover:dark:text-blue-300">
            <a href="{{ route('table') }}" wire:navigate>@lang('messages.devices')</a>
          </li>
          <li
            class="{{ Request::is('graphic')
                ? 'bg-blue-100 text-blue-800 font-medium dark:bg-blue-900 
                                                              dark:text-blue-300'
                : 'dark:text-white' }} text-[16px] px-4 py-3 rounded-full hover:bg-blue-100 
              hover:text-blue-800 hover:dark:bg-blue-900 
              hover:dark:text-blue-300">
            <a href="{{ route('graphic') }}" wire:navigate>@lang('messages.historical data')</a>
          </li>
          <li
            class="{{ Request::is('event-logger')
                ? 'bg-blue-100 text-blue-800 font-medium dark:bg-blue-900 
                                                              dark:text-blue-300'
                : 'dark:text-white' }} text-[16px] px-4 py-3 rounded-full hover:bg-blue-100 
              hover:text-blue-800 hover:dark:bg-blue-900 
              hover:dark:text-blue-300">
            <a href="{{ route('event-logger') }}" wire:navigate>@lang('messages.event logger')</a>
          </li>
          <li
            class="{{ Request::is('report')
                ? 'bg-blue-100 text-blue-800 font-medium dark:bg-blue-900 
                                                              dark:text-blue-300'
                : 'dark:text-white' }} text-[16px] px-4 py-3 rounded-full 
              hover:bg-blue-100 hover:text-blue-800 hover:dark:bg-blue-900 
              hover:dark:text-blue-300">
            <a href="{{ route('report') }}" wire:navigate>@lang('messages.report')</a>
          </li>
          <li class="lg:mt-[2px]">
            <button id="theme-toggle" type="button"
              class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 
                    dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 
                    dark:focus:ring-gray-700 rounded-lg 
                    text-sm p-2.5 lg:ml-[70px] ml-[3px]">
              <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
              </svg>
              <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1
                  1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1
                  1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1
                  1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414
                  8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0
                  100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd">
                </path>
              </svg>
            </button>
          </li>
          <li class="lg:mt-[5px]">
            <div class="dropdown">
              <button class="inline-flex items-center font-medium justify-center px-4 py-2 text-sm text-gray-900 dark:text-white rounded-lg cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white lg:ml-[-50px]">
                @if (session('locale', 'en') == 'id')
                <img alt="Indonesia" class="h-3.5 w-3.5 rounded-full me-2" src="http://purecatamphetamine.github.io/country-flag-icons/3x2/ID.svg"/>
                @else
                <img alt="United States" class="h-3.5 w-3.5 rounded-full me-2" src="http://purecatamphetamine.github.io/country-flag-icons/3x2/US.svg"/>
                @endif
                {{ session('locale', 'en') == 'id' ? 'Bahasa' : 'English' }}
                <i class="fa fa-caret-down"></i>
              </button>
              <div class="dropdown-content">
                <a href="{{ url('locale/en') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">
                  <div class="inline-flex items-center">
                      <img alt="United States" class="h-3.5 w-3.5 rounded-full me-2" src="http://purecatamphetamine.github.io/country-flag-icons/3x2/US.svg"/>
                      English
                  </div>
                </a>
                <a href="{{ url('locale/id') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">
                  <div class="inline-flex items-center">
                      <img alt="Indonesia" class="h-3.5 w-3.5 rounded-full me-2" src="http://purecatamphetamine.github.io/country-flag-icons/3x2/ID.svg"/>
                      Bahasa
                  </div>
                </a>
              </div>
            </div>
          </li>
        
          <li class="lg:mt-[-2px] lg:ml-[50px] ml-2">
            <x-dropdown align="right" width="48">
              <x-slot name="trigger">
                <button
                  class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 
                        font-medium rounded-md text-gray-500 dark:text-gray-400  hover:text-gray-700 
                        dark:hover:text-gray-300 focus:outline-none transition ease-in-out 
                        duration-150 ml-[-45px]">
                  <img class="w-8 h-8 rounded-full mr-3" src="{{ asset('img/avatar-1.png') }}" alt="user photo">
                  <div class="lg:text-[16px] text-[13px] hover:text-[#193766] hover:font-bold" x-data="{
                      name: '{{ auth()->user()->name }}',
                      formatName(name) {
                          return name.replace(/_/g, ' ').replace(/\b\w/g, char => char.toUpperCase());
                      }
                  }"
                    x-init="name = formatName(name)" x-text="name"
                    x-on:profile-updated.window="name = formatName($event.detail.name)">
                  </div>
                  <div class="ms-1">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                      <path fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd" />
                    </svg>
                  </div>
                </button>
              </x-slot>
              <x-slot name="content">
                <x-dropdown-link :href="route('filament.admin.auth.login')" target="_blank">
                  @lang('messages.admin panel')
                </x-dropdown-link>
                <x-dropdown-link :href="'/health?fresh'" target="_blank">
                  @lang('messages.health check')
                </x-dropdown-link>
                <!-- Authentication -->
                <button wire:click="logout" class="w-full text-start">
                  <x-dropdown-link>
                    @lang('messages.logout')
                  </x-dropdown-link>
                </button>
              </x-slot>
            </x-dropdown>
          </li>
        </ul>
      @endif
    </div>
  </div>
</nav>
