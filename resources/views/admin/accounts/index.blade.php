<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <h2 class="font-semibold md:text-5xl text-4xl text-indigo-800 leading-tight mb-10 sm:m-0 sm:mb-10 ml-5 mr-5">
                    {{ __('Account overzicht') }}
                </h2>

                <div class="container bg-white p-0 pb-5 pt-10 shadow-md border-2 mt-10 flex flex-col items-center justify-center">
                    <table class="border border-gray-400">
                      <tr class="text-left border-b border-gray-400">
                        <th class="p-2 border-l border-gray-200">Voornaam</th>
                        <th class="p-2 border-l border-gray-200">Achternaam</th>
                        <th class="p-2 border-l border-gray-200">Geboortedatum</th>
                        <th class="p-2 border-l border-gray-200">Email</th>
                        <th class="p-2 border-l border-gray-200">Rol</th>
                        <th class="p-2 border-l border-gray-200">Credits</th>
                        <th class="p-2 border-l border-gray-200">Acties</th>
                        <th class="p-2 border-l border-gray-200">Blokkeren</th>
                      </tr>
                      @foreach($users as $user)
                      <tr class="border-b border-gray-400">
                        <td class="p-2">{{ $user->first_name }}</td>
                        <td class="p-2 border-l border-gray-200">{{ $user->last_name }}</td>
                        <td class="p-2 border-l border-gray-200">{{ $user->birth_date }}</td>
                        <td class="p-2 border-l border-gray-200">{{ $user->email }}</td>
                        <td class="p-2 border-l border-gray-200">
                        @if($user->is_admin == 1)
                            Admin
                        @else
                            Klant
                        @endif
                        </td>
                        <td class="p-2 border-l border-gray-200">{{ $user->credits }}</td>
                        <td class="p-2 border-l border-gray-200">

                            <a href="{{ route('accounts.edit', $user->id) }}" class="text-blue-500 pr-5">Wijzig</a>

                            <form class="inline-block" action="{{ route('accounts.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Weet je zeker dat je deze leraar wil verwijderen?');">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="text-red-600 hover:text-red-900 bg-transparent" value="Verwijder">
                            </form>

                        </td>
                        <td class="p-2 border-l border-gray-200"><input type="checkbox"></td>
                      </tr>
                      @endforeach
                    </table>
                    <div class="my-3">
                        {{ $users->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
