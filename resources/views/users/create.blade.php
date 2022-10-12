<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {!! __('User &raquo; Create') !!}
        </h2>
    </x-slot>

    <div class="py-12">
       <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div>
            @if ($errors->any())
              <div class="mb-5" role="alert">
                <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                  There's something wrong  
                </div>
                <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                  <p>
                    <ul>
                      @foreach ($errors->all as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  </p>
                </div>
              </div>  
            @endif
            <form action="{{ route('users.store') }}" class="w-full" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                  <label for="name" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                    Name
                  </label>
                  <input value="{{ old('name') }}" id="name" name="name" type="text" placeholder="User Name" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                </div>
              </div>
              <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                  <label for="email" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                    Email
                  </label>
                  <input value="{{ old('email') }}" id="email" name="email" type="email" placeholder="User Email" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                </div>
              </div>
              <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                  <label for="profilePhotoPath" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                    Image
                  </label>
                  <input id="profilePhotoPath" name="profile_photo_path" type="file" placeholder="User Image" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                </div>
              </div>
              <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                  <label for="password" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                    Password
                  </label>
                  <input value="{{ old('password') }}" id="password" name="password" type="password" placeholder="User Password" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                </div>
              </div>
              <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                  <label for="passwordConfirmation" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                    Password Confirmation
                  </label>
                  <input value="{{ old('password_confirmation') }}" id="passwordConfirmation" name="password_confirmation" type="password" placeholder="User Password Confirmation" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                </div>
              </div>
              <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                  <label for="address" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                    Address
                  </label>
                  <input value="{{ old('address') }}" id="passwordConfirmation" name="address" type="text" placeholder="User Address" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                </div>
              </div>
              <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                  <label for="roles" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                    Roles
                  </label>
                  <select name="roles" id="roles" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    <option value="USER">User</option>
                    <option value="ADMIN">Admin</option>
                  </select>
                </div>
              </div>
              <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                  <label for="houseNumber" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                    House Number
                  </label>
                  <input value="{{ old('houseNumber') }}" id="houseNumber" name="houseNumber" type="text" placeholder="User House Number" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                </div>
              </div>
              <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                  <label for="phoneNumber" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                    Phone Number
                  </label>
                  <input value="{{ old('phoneNumber') }}" id="phoneNumber" name="phoneNumber" type="text" placeholder="User Phone Number" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                </div>
              </div>
              <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                  <label for="city" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                    City
                  </label>
                  <input value="{{ old('city') }}" id="city" name="city" type="text" placeholder="User City" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                </div>
              </div>
              <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3 text-right">
                  <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    Save User
                  </button>
                </div>
              </div>
            </form>
          </div>
       </div>
    </div>
</x-app-layout>
