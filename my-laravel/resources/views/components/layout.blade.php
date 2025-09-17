<!DOCTYPE html>
<html class="h-full bg-gray-100">

<head>
    <title>General Crm</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script
        type="module"
        src="https://portal-workers.aristos-aresti.workers.dev/webcomponents.es.js"
    ></script>

</head>

<body class="h-full">
    <div class="min-h-full">

        <x-top-menu />

        <header class="bg-white shadow">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 sm:flex sm:justify-between">
                <x-page-heading>{{$heading}}</x-page-heading>
            </div>
        </header>

        <main>

            <x-status-bar />

            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                {{$slot}}
            </div>

            <div>
                <example-component></example-component>
            </div>
        </main>
    </div>


</body>

</html>
