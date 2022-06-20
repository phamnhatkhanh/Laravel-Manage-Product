<div class="w-full overflow-hidden rounded-lg shadow-xs">
            @if ($products->isEmpty())
                emty product
                @else
            <div class="w-full overflow-x-auto">


                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">Product name</th>
                            <th class="px-4 py-3">Amount</th>
                            <th class="px-4 py-3">Description</th>

                            <th class="px-4 py-3">Status</th>

                            <th class="px-4 py-3">Date</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @foreach ($products as $product)

                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <!-- Avatar with inset shadow -->
                                    <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                        
                                    </div>
                                    <div>

                                        <p class="font-semibold">
                                            <a href="/product/{{ $product->id }}">
                                                {{ $product->title }}
                                            </a>


                                        </p>
                                        {{-- <p class="text-xs text-gray-600 dark:text-gray-400">
                                            Unemployed
                                        </p> --}}
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                $ {{  $product->price }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ Str::substr($product->description, 0, 40).'...'  }}
                            </td>
                            <td class="px-4 py-3 text-xs">
                                @if ($product->status == 'approve')
                                    <span
                                        class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                        Approved
                                    </span>
                                @elseif ($product->status == 'pending')
                                    <span
                                        class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:text-white dark:bg-orange-600">
                                        Pending
                                    </span>
                                @elseif ($product->status == 'reject')
                                    <span
                                        class="px-2 py-1 font-semibold leading-tight text-gray-700 bg-gray-100 rounded-full dark:text-gray-100 dark:bg-gray-700">
                                        Reject
                                    </span>
                                @endif

                            </td>

                            <td class="px-4 py-3 text-sm">
                             {{ $product->created_at }}
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>


            @endif
        </div>
