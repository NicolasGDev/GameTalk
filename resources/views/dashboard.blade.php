@extends('layouts.admin')
@section('content')
    <!-- Content -->
    <div class="p-6">
        <div>
            <h2 class="text-white text-2xl font-semibold mb-6">Dashboard</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
            <div class="bg-gray-800 rounded-md   p-6 shadow-md shadow-black/5">
                <div class="flex justify-between mb-6">
                    <div>
                        <div class="flex items-center mb-1">
                            <div class="text-2xl text-white font-semibold">{{ $users }}</div>
                        </div>
                        <div class="text-sm font-medium text-white">Usuarios registrados</div>
                    </div>
                </div>

                <a href="{{ route('users.manage.index') }}"
                    class="text-main font-medium text-sm hover:text-mainClaro">View</a>
            </div>
            <div class="bg-gray-800 rounded-md  p-6 shadow-md shadow-black/5">
                <div class="flex justify-between mb-4">
                    <div>
                        <div class="flex items-center mb-1">
                            <div class="text-2xl text-white font-semibold">{{ $posts }}</div>

                        </div>
                        <div class="text-sm font-medium text-white">Publicaciones</div>
                    </div>

                </div>
                <a href="{{ route('posts.manage.index') }}" class="text-main font-medium text-sm">View</a>
            </div>
            <div class="bg-gray-800  rounded-md  p-6 shadow-md shadow-black/5">
                <div class="flex justify-between mb-6">
                    <div>
                        <div class="text-2xl font-semibold mb-1">100</div>
                        <div class="text-sm font-medium text-gray-400">Blogs</div>
                    </div>
                    <div class="dropdown">
                        <button type="button" class="dropdown-toggle text-gray-400 hover:text-gray-600"><i
                                class="ri-more-fill"></i></button>
                        <ul
                            class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md bg-white border border-gray-100 w-full max-w-[140px]">
                            <li>
                                <a href="#"
                                    class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Profile</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Settings</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <a href="" class="text-[#f84525] font-medium text-sm hover:text-red-800">View</a>
            </div>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
            <div
                class="p-6 relative flex flex-col min-w-0 mb-4 lg:mb-0 break-words bg-gray-50 dark:bg-gray-800 w-full shadow-lg rounded">
                <div class="rounded-t mb-0 px-0 border-0">
                    <div class="flex flex-wrap items-center px-4 py-2">
                        <div class="relative w-full max-w-full flex-grow flex-1">
                            <h3 class="font-semibold text-base text-gray-900 dark:text-gray-50">Usuarios</h3>
                        </div>
                    </div>
                    <div class="block w-full overflow-x-auto">
                        <table class="items-center w-full bg-transparent border-collapse">
                            <thead>
                                <tr>
                                    <th
                                        class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        Roles
                                    </th>
                                    <th
                                        class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        Cantidad de Usuarios
                                    </th>
                                    <th
                                        class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        Porcentaje
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                    <tr class="text-gray-700 dark:text-gray-100">
                                        <th
                                            class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                                            {{ $role->name }}
                                        </th>
                                        <td
                                            class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                            {{ $role->users_count }}
                                        </td>
                                        <td
                                            class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                            <div class="flex items-center">
                                                @php
                                                    $totalUsers = \App\Models\User::where('state', 1)->count();
                                                    $percentage =
                                                        $totalUsers > 0
                                                            ? round(($role->users_count / $totalUsers) * 100)
                                                            : 0;
                                                @endphp
                                                <span class="mr-2">{{ $percentage }}%</span>
                                                <div class="relative w-full">
                                                    <div class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                                                        <div style="width: {{ $percentage }}%"
                                                            class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-600">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            <div class="bg-gray-800 shadow-md shadow-black/5 p-6 rounded-md">
                <div class="flex justify-between mb-4 items-start">
                    <div class="font-medium">Activities</div>
                    <div class="dropdown">
                        <button type="button" class="dropdown-toggle text-gray-400 hover:text-gray-600"><i
                                class="ri-more-fill"></i></button>
                        <ul
                            class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md bg-white border border-gray-100 w-full max-w-[140px]">
                            <li>
                                <a href="#"
                                    class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Profile</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Settings</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="overflow-hidden">
                    <table class="w-full min-w-[540px]">
                        <tbody>
                            <tr>
                                <td class="py-2 px-4 border-b border-b-gray-50">
                                    <div class="flex items-center">
                                        <a href="#"
                                            class="text-gray-600 text-sm font-medium hover:text-blue-500 ml-2 truncate">Lorem
                                            Ipsum</a>
                                    </div>
                                </td>
                                <td class="py-2 px-4 border-b border-b-gray-50">
                                    <span class="text-[13px] font-medium text-gray-400">02-02-2024</span>
                                </td>
                                <td class="py-2 px-4 border-b border-b-gray-50">
                                    <span class="text-[13px] font-medium text-gray-400">17.45</span>
                                </td>
                                <td class="py-2 px-4 border-b border-b-gray-50">
                                    <div class="dropdown">
                                        <button type="button"
                                            class="dropdown-toggle text-gray-400 hover:text-gray-600 text-sm w-6 h-6 rounded flex items-center justify-center bg-gray-50"><i
                                                class="ri-more-2-fill"></i></button>
                                        <ul
                                            class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md bg-white border border-gray-100 w-full max-w-[140px]">
                                            <li>
                                                <a href="#"
                                                    class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Profile</a>
                                            </li>
                                            <li>
                                                <a href="#"
                                                    class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Settings</a>
                                            </li>
                                            <li>
                                                <a href="#"
                                                    class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Logout</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 border-b border-b-gray-50">
                                    <div class="flex items-center">
                                        <a href="#"
                                            class="text-gray-600 text-sm font-medium hover:text-blue-500 ml-2 truncate">Lorem
                                            Ipsum</a>
                                    </div>
                                </td>
                                <td class="py-2 px-4 border-b border-b-gray-50">
                                    <span class="text-[13px] font-medium text-gray-400">02-02-2024</span>
                                </td>
                                <td class="py-2 px-4 border-b border-b-gray-50">
                                    <span class="text-[13px] font-medium text-gray-400">17.45</span>
                                </td>
                                <td class="py-2 px-4 border-b border-b-gray-50">
                                    <div class="dropdown">
                                        <button type="button"
                                            class="dropdown-toggle text-gray-400 hover:text-gray-600 text-sm w-6 h-6 rounded flex items-center justify-center bg-gray-50"><i
                                                class="ri-more-2-fill"></i></button>
                                        <ul
                                            class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md bg-white border border-gray-100 w-full max-w-[140px]">
                                            <li>
                                                <a href="#"
                                                    class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Profile</a>
                                            </li>
                                            <li>
                                                <a href="#"
                                                    class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Settings</a>
                                            </li>
                                            <li>
                                                <a href="#"
                                                    class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Logout</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endsection
