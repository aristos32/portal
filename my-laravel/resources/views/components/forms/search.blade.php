 <form method="POST" class="max-w-sm mx-auto" action="{{route('search')}}">
     @csrf
     <div class="mb-4">
         <label for="state-id" class="block text-gray-700 text-sm font-bold mb-2">State Id</label>
         <input type="text" id="state-id" name="state-id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
     </div>
     <!--search name-->
     <div class="mb-4">
         <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
         <input type="text" id="name" name="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
     </div>
     <!--search surname-->
     <div class="mb-4">
         <label for="surname" class="block text-gray-700 text-sm font-bold mb-2">Surname</label>
         <input type="text" id="surname" name="surname" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
     </div>
     <!--search email-->
     <div class="mb-4">
         <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
         <input type="text" id="email" name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
     </div>
     <!--search phone-->
     <div class="mb-4">
         <label for="phone" class="block text-gray-700 text-sm font-bold mb-2">Phone</label>
         <input type="text" id="phone" name="phone" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
     </div>
     <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
         Search
     </button>
 </form>

 <!-- Display users -->
 @if (isset($users))
 dd($users);
 <div class="overflow-hidden shadow sm:rounded-md">
     <div class="overflow-hidden shadow sm:rounded-md">
         <table class="min-w-full divide-y divide-gray-200">
             <thead class="bg-gray-50">
                 <tr>
                     <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                     <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Surname</th>
                     <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                     <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Phone</th>
                 </tr>
             </thead>
             <tbody class="bg-white divide-y divide-gray-200">
                 @foreach ($users as $user)
                 <tr>
                     <td class="px-6 py-4 whitespace-nowrap">{{ $user->first_name }}</td>
                     <td class="px-6 py-4 whitespace-nowrap">{{ $user->last_name }}</td>
                     <td class="px-6 py-4 whitespace-nowrap">{{ $user->email }}</td>
                     <td class="px-6 py-4 whitespace-nowrap">{{ $user->phone }}</td>
                 </tr>
                 @endforeach
             </tbody>
         </table>
     </div>
 </div>
 @endif