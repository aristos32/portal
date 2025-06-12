<form method="POST" class="max-w-sm mx-auto" action="{{route('search.process', ['locale' => app()->getLocale()])}}">
    @csrf
    <div class="mb-4">
        <label for="state-id" class="block text-gray-700 text-sm font-bold mb-2">{{__('general.State Id')}}</label>
        <input type="text" id="state-id" name="state-id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    </div>
    <!--search name-->
    <div class="mb-4">
        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">{{__('general.Name')}}</label>
        <input type="text" id="name" name="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    </div>
    <!--search surname-->
    <div class="mb-4">
        <label for="surname" class="block text-gray-700 text-sm font-bold mb-2">{{__('general.Surname')}}</label>
        <input type="text" id="surname" name="surname" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    </div>
    <!--search email-->
    <div class="mb-4">
        <label for="email" class="block text-gray-700 text-sm font-bold mb-2">{{__('general.Email')}}</label>
        <input type="text" id="email" name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    </div>
    <!--search phone-->
    <div class="mb-4">
        <label for="phone" class="block text-gray-700 text-sm font-bold mb-2">{{__('general.Phone')}}</label>
        <input type="text" id="phone" name="phone" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    </div>
    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Search
    </button>
</form>