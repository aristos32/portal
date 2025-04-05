<div>
    @php
    $currentRoute = Route::current();
    $currentLocale = app()->getLocale();
    $otherLocale = $currentLocale === 'en' ? 'gr' : 'en';

    // get current route name and params
    $routeName = $currentRoute?->getName();
    $routeParams = $currentRoute?->parameters();

    // replace the locale
    $routeParams['locale'] = $otherLocale;
    @endphp

    <a href="{{ route($routeName, $routeParams) }}"
        class="inline-block px-4 py-2 rounded-md bg-gray-100 hover:bg-gray-200 text-gray-700 transition">
        @if($otherLocale === 'gr')
        🇬🇷 Ελληνικά
        @else
        🇬🇧 English
        @endif
    </a>
</div>