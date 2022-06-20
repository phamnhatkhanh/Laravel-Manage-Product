<div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-2">

    <!-- Card -->
    <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <div class="p-3 mr-4 text-blue-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
            <i class="fa fa-database" aria-hidden="true"></i>
        </div>
        <div>
            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                Total products
            </p>
            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    @php
                    $total_product=0;
                    foreach ($group_by_status as $value) {

                        $total_product+=$value->total;
                    }
                        echo $total_product;
                @endphp
            </p>
        </div>
    </div>
    @foreach ($group_by_status as $value)
        <!-- Card -->
        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 float-right" >
            <div>
                @if ($value->status == 'approve')
                    <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
                        <i class="fa fa-check-circle"></i>
                    </div>
                @elseif ($value->status == 'pending')
                    <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full ">
                        <i class="fa fa-pause-circle dark:text-orange-500 dark:bg-orange-500"></i>
                    </div>
                @elseif ($value->status == 'reject')
                    <div class="p-3 mr-4 text-teal-500 bg-gray-100 rounded-full dark:text-teal-100 dark:bg-teal-500">
                        <i class="fa fa-ban"></i>
                    </div>
                @endif
            </div>
            <div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                        <span style='text-transform: capitalize'> {{ $value->status  }} </span>products
                    </p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                        {{ $value->total  }}
                    </p>
                </div>

            </div>
        </div>
    @endforeach
</div>
