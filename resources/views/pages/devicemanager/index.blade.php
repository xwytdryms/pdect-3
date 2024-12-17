<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          {{ __('Manage Your Devices') }}
      </h2>
  </x-slot>
@if (session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif
  {{-- Table --}}
  <section class="bg-gray-50 dark:bg-gray-900 h-full flex p-6">
      {{-- Table Header --}}
      <div class="max-w-screen-xl px-4 mx-auto lg:px-12 w-full ">
          <!-- Start coding here -->
          <div class="relative bg-white shadow-md dark:bg-gray-800 rounded-lg ">
              <div class="flex flex-row items-center justify-center lg:justify-between p-4 space-y-3 md:flex-row md:space-y-0 md:space-x-4">
                  <div class="">
                    <a href="{{ route('dashboard') }}"
                    class="hidden lg:flex items-center space-x-2 px-4 py-2 text-sm font-medium text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                    <!-- Ikon -->
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="w-5 h-5 text-white" aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M9.53 2.47a.75.75 0 0 1 0 1.06L4.81 8.25H15a6.75 6.75 0 0 1 0 13.5h-3a.75.75 0 0 1 0-1.5h3a5.25 5.25 0 1 0 0-10.5H4.81l4.72 4.72a.75.75 0 1 1-1.06 1.06l-6-6a.75.75 0 0 1 0-1.06l6-6a.75.75 0 0 1 1.06 0Z"
                            clip-rule="evenodd" />
                    </svg>
                    <!-- Teks -->
                    <span>Back to Dashboard</span>
                </a>
                
                  </div>
                  <div class="flex flex-col  justify-end flex-shrink-0 w-auto space-y-2 md:w-auto md:flex-row md:space-y-0 md:items-center md:space-x-3">
                      <button id="addDevice" type="button" data-modal-target="addDeviceModal"
                          data-modal-toggle="addDeviceModal"
                          class="flex items-center justify-center px-4 py-2 text-sm font-medium text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                          <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20"
                              xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                              <path clip-rule="evenodd" fill-rule="evenodd"
                                  d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                          </svg>
                          Add Device
                      </button>
                      <div id="addDeviceModal" tabindex="-1" aria-hidden="true"
                          class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                          <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                              <!-- Modal content -->
                              <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                                  <!-- Modal header -->
                                  <div
                                      class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                                      <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                          Add Device
                                      </h3>
                                      <button type="button"
                                          class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                          data-modal-toggle="addDeviceModal">
                                          <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                              viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                              <path fill-rule="evenodd"
                                                  d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                  clip-rule="evenodd"></path>
                                          </svg>
                                          <span class="sr-only">Close modal</span>
                                      </button>
                                  </div>
                                  <!-- Modal body -->

                                  <form action="{{ route('devicemanager.store') }}" method="POST">
                                      @csrf
                                      <div class="grid gap-4 mb-4 sm:grid-cols-2">
                                          <div>
                                              <label for="name"
                                                  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Device
                                                  Name</label>
                                              <input type="text" name="name" id="name" value=""
                                                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                  placeholder="">
                                          </div>
                                          <div>
                                              <label for="address"
                                                  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                                              <input type="text" name="address" id="address" value=""
                                                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 overflow-x hover:overflow-scroll"
                                                  placeholder="">
                                          </div>
                                          <div>
                                              <label for="device_id"
                                                  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Device
                                                  id</label>
                                              <input type="text" name="device_id" id="device_id" value=""
                                                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 overflow-x hover:overflow-scroll"
                                                  placeholder="">
                                          </div>
                                          <div>
                                              <label for="device_eui"
                                                  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Device
                                                  EUI</label>
                                              <input type="text" name="device_eui" id="device_eui" value=""
                                                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 overflow-x hover:overflow-scroll"
                                                  placeholder="">
                                          </div>
                                          <div>
                                              <label for="latitude"
                                                  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Latitude</label>
                                              <input type="text" name="latitude" id="latitude" value=""
                                                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 overflow-x hover:overflow-scroll"
                                                  placeholder="">
                                          </div>
                                          <div>
                                              <label for="longitude"
                                                  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Longitude</label>
                                              <input type="text" name="longitude" id="longitude" value=""
                                                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 overflow-x hover:overflow-scroll"
                                                  placeholder="">
                                          </div>
                                      </div>
                                      <div class="flex justify-center items-center space-x-4">
                                          <button type="submit"
                                              class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                              Add Device
                                          </button>
                                      </div>
                                  </form>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              {{-- Table Content --}}
              <div class="relative overflow-auto hover:overflow-scroll shadow-md sm:rounded-lg">
                  <table class="w-full text-sm text-center rtl:text-right text-gray-500 dark:text-gray-400">
                      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                          <tr>
                              <th scope="col" class="px-6 py-3">
                                  No
                              </th>
                              <th scope="col" class="px-6 py-3">
                                  Device Name
                              </th>
                              <th scope="col" class="px-6 py-3">
                                  Device Id
                              </th>
                              <th scope="col" class="px-6 py-3">
                                  Device EUI
                              </th>
                              <th scope="col" class="px-6 py-3">
                                  Address
                              </th>
                              <th scope="col" class="px-6 py-3">
                                  Latitude
                              </th>
                              <th scope="col" class="px-6 py-3">
                                  Longitude
                              </th>
                              <th scope="col" class="px-6 py-3">
                                  Actions
                              </th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($devices as $index => $device)
                          <tr
                              class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                              <th scope="row"
                                  class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                  {{ $index + 1 }}
                              </th>
                              <td class="px-6 py-4">
                                  {{ $device['name'] }}
                              </td>
                              <td class="px-6 py-4">
                                  {{ $device['device_id'] }}
                              </td>
                              <td class="px-6 py-4">
                                  {{ $device['device_eui'] }}
                              </td>
                              <td class="px-6 py-4">
                                  {{ $device['address'] }}
                              </td>
                              <td class="px-6 py-4">
                                  {{ $device['latitude'] }}
                              </td>
                              <td class="px-6 py-4">
                                  {{ $device['longitude'] }}
                              </td>
                              <td class="px-6 py-4 text-right">
                                <div class="flex justify-between">
                                    <button id="editDevice_{{ $device['id'] }}" data-modal-target="editDeviceModal_{{ $device['id'] }}"
                                        data-modal-toggle="editDeviceModal_{{ $device['id'] }}"
                                        class="flex text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                                        type="button">
                                        Edit
                                    </button>
                                    @include('pages.devicemanager.edit-device-form')
                                    <form action="{{ route('devicemanager.delete', ['device' => $device['id']]) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button id="deleteDevice" onclick="return confirm('Are you sure?')"
                                            class="flex ms-4 text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                                            type="submit">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                              </td>
                          </tr>
                          @endforeach
                      </tbody>
                  </table>
              </div>
  </section>

  @push('scripts')
  {{-- <script src="{{ asset('resources/js/external/devicemanager.js') }}"></script> --}}
  @endpush
</x-app-layout>
