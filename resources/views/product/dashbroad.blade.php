@extends('layouts.app')
@section('content')
<main class="h-full overflow-y-auto">
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Dashboard
        </h2>
        <!-- Filter and Summary-->
        @include('component.filter')


        <a href="/product/create" class=" mt-3 bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 ">
        Create Product
        </a>

        <!-- Show products -->
        @include('component.list_product')
        {{-- Panigation --}}
        {{ $products->links() }}
    </div>
</main>

@endsection
