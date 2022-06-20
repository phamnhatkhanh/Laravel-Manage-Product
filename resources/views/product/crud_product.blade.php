@extends('layouts.app')
@section('content')

<div class="container w-full px-5 py-6 mx-auto">
        <div class="flex items-center min-h-screen bg-gray-50">
            <div class="flex-1 h-full max-w-4xl mx-auto bg-white rounded-lg shadow-xl">
                <div class="flex flex-col md:flex-row">
                    <div class="h-32 md:h-auto md:w-1/2">
                        <img class="object-cover w-full h-full"
                            src="https://cdn.pixabay.com/photo/2021/01/15/17/01/green-5919790__340.jpg" alt="img" />
                    </div>

                    <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                        <div class="w-full">
                            <h3 class="mb-4 text-xl font-bold text-blue-600">Create Customer</h3>

                            @foreach ( $product as $item )


                            <form method="POST" action="/product/{{ $item->id }}">
                                @csrf
                                @method('PUT')
                                <div class="sm:col-span-6">
                                    <label for="full_name" class="block text-sm font-medium text-gray-700"> Title
                                    </label>
                                    <div class="mt-1">
                                        <input type="text" id="full_name" name="title"
                                            value="{{ $item->title ?? '' }}"
                                            class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                    </div>
                                    @error('full_name')
                                        <div class="text-sm text-red-400">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="sm:col-span-6">
                                    <label for="address" class="block text-sm font-medium text-gray-700">price
                                    </label>
                                    <div class="mt-1">
                                        <input type="number"  step=any name="price"
                                            value="{{ $item->price ?? '' }}"
                                            class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                    </div>
                                    @error('address')
                                        <div class="text-sm text-red-400">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="sm:col-span-6">
                                    <label for="number_phone" class="block text-sm font-medium text-gray-700"> Description
                                    </label>
                                    <div class="mt-1">
                                        <textarea style="align-content:center; overflow:auto;height: 100px;  resize: none;"   name="desc"class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" >{{ $item->description }}</textarea>
                                    </div>
                                    @error('number_phone')
                                        <div class="text-sm text-red-400">{{ $message }}</div>
                                    @enderror
                                </div>
                                    <select id="status" name="status" class="form-multiselect block w-full mt-1">
                                        {{-- @if ({{ $item->status == 'approve' }}) selected='select' @endif  --}}
                                        <option value="approve"
                                            @php
                                                if ( $item->status == 'approve' ) echo('selected="select"')
                                            @endphp  >Approve
                                        </option>
                                        <option value="pending"
                                            @php
                                                if ( $item->status == 'pending' ) echo('selected="select"')
                                            @endphp  >Pending
                                        </option>
                                        <option value="reject"
                                            @php
                                                if ( $item->status == 'reject' ) echo('selected="select"')
                                            @endphp>Reject
                                        </option>
                                    </select>
                                <input type="hidden" name='id_user' value="{{ Auth::id() }}">
                                <span class='float-left mt-3 mr-3'>

                                    <button
                                        class="px-4 py-2 bg-green-400 hover:bg-green-700 rounded-lg  rounded-full dark:text-green-100"
                                        type="submit">
                                        update
                                    </button>
                                </span>
                            </form>


                            <span class='float-left mt-3 mr-3'>
                                <form action="/product/{{ $item->id }}"method="POST">
                                    @csrf
                                    @method('delete')

                                    <button
                                        class="px-4 py-2 bg-orange-500 hover:bg-orange-700 rounded-lg   rounded-full dark:text-white dark:bg-orange-600"
                                        type="submit">
                                        Delete
                                    </button>

                                </form>
                            </span>

                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
