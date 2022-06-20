<div class=" grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-2 ">
    <form id ='filter_product' action="/product/filter" method="POST"
                class ='w-full shadow p-5 rounded-lg bg-white'>
                @csrf

                <div class="flex items-center justify-between mt-4">
                    <p class="font-medium">
                        Filter Product
                    </p>


                </div>
                <div class=" grid gap-6 my-4 ">
                    <div class=" flex items-center ml-2 h-full md:grid-cols-2 xl:grid-cols-2">
                        <div class='mr-3'>
                            <svg class="w-4 h-4 fill-current text-primary-gray-dark inline" viewBox="0 0 16 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M15.8898 15.0493L11.8588 11.0182C11.7869 10.9463 11.6932 10.9088 11.5932 10.9088H11.2713C12.3431 9.74952 12.9994 8.20272 12.9994 6.49968C12.9994 2.90923 10.0901 0 6.49968 0C2.90923 0 0 2.90923 0 6.49968C0 10.0901 2.90923 12.9994 6.49968 12.9994C8.20272 12.9994 9.74952 12.3431 10.9088 11.2744V11.5932C10.9088 11.6932 10.9495 11.7869 11.0182 11.8588L15.0493 15.8898C15.1961 16.0367 15.4336 16.0367 15.5805 15.8898L15.8898 15.5805C16.0367 15.4336 16.0367 15.1961 15.8898 15.0493ZM6.49968 11.9994C3.45921 11.9994 0.999951 9.54016 0.999951 6.49968C0.999951 3.45921 3.45921 0.999951 6.49968 0.999951C9.54016 0.999951 11.9994 3.45921 11.9994 6.49968C11.9994 9.54016 9.54016 11.9994 6.49968 11.9994Z">
                                </path>
                            </svg>
                            <input type="text" name = 'keyword' placeholder="Search by name product, description..."
                            class="px-8 py-3 w-100 rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm">
                        </div>


                        <div >
                            <select id="status" name="status" class="form-multiselect block w-full mt-1">
                                        <option value="" selected='select'>Status product</option>
                                        <option value="approve">Approve</option>
                                        <option value="pending">Pending</option>
                                        <option value="reject">Reject</option>
                            </select>

                        </div>
                    </div>


                </div>



                <div>
                    <p class="font-medium">
                            Price:
                        </p>
                    <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-4 mt-4">

                        <label for="first_name" class="block text-sm font-medium text-gray-700"> From </label>

                        <div class="mt-1">
                            <input type="number"  name="from_price"
                                class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                        </div>

                        <label for="first_name" class="block text-sm font-medium text-gray-700"> To </label>

                        <div class="mt-1">
                            <input type="number" name="to_price"
                                class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                        </div>


                    </div>
                </div>
                @if (!empty($errors))
                    @foreach ($errors as $err)
                    <p> {{ $err }}</p>
                    @endforeach
                @endif
                <div class="mt-3">
                    <button class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-800 text-sm font-medium rounded-md">
                    Filter
                </button>
                <a class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-800 text-sm font-medium rounded-md" onclick="clearForm()">
                    Clear form
                </a>
                </div>

    </form>




    @include('component.summary')
</div>

<script>
    function clearForm(){
document.getElementById('filter_product').reset(); document.getElementById('from').value = null; return false;
    }

</script>
