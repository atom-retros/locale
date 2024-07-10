<div x-data="{ localeVisible: false }" class="relative">
    <button class="flex items-center gap-1 px-2 py-1 h-8 rounded-lg hover:gray-100 bg-gray-100 hover:bg-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700" @click="localeVisible = !localeVisible">
        <img src="{{ asset('assets/images/icons/flags/' . app()->getLocale() . '.png') }}" alt="{{ app()->getLocale() }}"/>
        <svg class="w-4 h-4 dark:text-white" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 12a1 1 0 0 1-.7-.29l-4-4a1 1 0 1 1 1.4-1.42L10 10.59l3.3-3.3a1 1 0 1 1 1.4 1.42l-4 4a1 1 0 0 1-.7.29z"/>
        </svg>
    </button>

    <div x-show="localeVisible" class="absolute mt-3 top-full z-20 bg-white rounded-lg w-full shadow border dark:bg-gray-900 dark:border-gray-950" x-transition @click.outside="localeVisible = false">
        @foreach (config('locale.supported_locales') as $locale)
            <a href="{{ route('locale', ['locale' => $locale['country_code']]) }}" class="flex items-center justify-center p-2 hover:bg-gray-100 dark:hover:bg-gray-950">
                <img src="{{ asset('assets/images/icons/flags/' . $locale['country_code'] . '.png') }}" alt="{{ $locale['language'] }}"/>
            </a>
        @endforeach
    </div>
</div>
