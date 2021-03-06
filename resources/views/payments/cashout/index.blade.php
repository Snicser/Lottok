<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <h2 class="font-semibold md:text-5xl text-4xl text-indigo-800 leading-tight mb-10 sm:m-0 sm:mb-10">
                    {{ __('Geld uitcashen') }}
                </h2>

                @if ($errors->any())
                    <div class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-red-500">
                          <span class="text-xl inline-block mr-5 align-middle">
                              <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                          </span>
                        <span class="inline-block align-middle mr-8">
                            <b class="capitalize">Oeps! Er is iets fout gegaan!</b>
                            @foreach ($errors->all() as $error)
                                <p>&#8594; {{ $error }}</p>
                            @endforeach
                        </span>
                    </div>
                @endif

                @if(session()->has('success'))
                    <div class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-green-600">
                          <span class="text-xl inline-block mr-5 align-middle">
                              <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                          </span>
                        <span class="inline-block align-middle mr-8">
                            <b class="capitalize">Gefeliciteerd!</b>
                            {{ session()->get('success') }}
                        </span>
                    </div>
                @endif

                <div class="text-xl text-gray-700 font-semibold">
                    <p>Jouw saldo: {{ auth()->user()->credits }}</p>
                </div>

                <div class="text-xl text-gray-700 font-semibold mt-5">
                    <p>Typ het bedrag waarmee je wilt uitcashen! <span class="capitalize">let op:</span> minimale bedrag is 20 euro.</p>
                    <p class="mt-1"><span class="capitalize">let op:</span> er worden 7% kosten over je uitbetaling berekend.</p>
                </div>

                <form action="{{ route('cashout.store') }}" method="POST" class="mt-5">
                    @csrf

                    <div class="mt-5">
                        <label for="amount" class="block text-sm font-medium text-gray-700">Bedrag:</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <input type="text" name="amount" id="amount"
                                   class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pr-12 sm:text-sm border-gray-300 rounded-md"
                                   placeholder="50">
                        </div>
                    </div>

                    <div class="flex justify-end">
                        <x-jet-button class="mt-5">Uitcashen</x-jet-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

