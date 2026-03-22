<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            問い合わせ一覧
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('contacts.create') }}" class="text-blue-500">新規登録</a>
                    <form class="mb-8" method="get" action="{{ route('contacts.index') }}">
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="名前・メール・件名で検索" class="border rounded px-3 py-2" />
                        <button class="ml-2 text-white bg-indigo-500 px-4 py-2 rounded hover:bg-indigo-600">検索</button>
                    </form>
                    <div class="w-full overflow-auto">
                        <table claÍss="table-auto w-full text-left whitespace-no-wrap">
                            <thead>
                                <tr>
                                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">id</th>
                                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">氏名</th>
                                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">件名</th>
                                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">登録日</th>
                                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">詳細</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($contacts as $contact)
                                <tr>
                                    <td class="border-t-2 border-gray-200 px-4 py-3">{{ $contact->id }}</td>
                                    <td class="border-t-2 border-gray-200 px-4 py-3">{{ $contact->name }}</td>
                                    <td class="border-t-2 border-gray-200 px-4 py-3">{{ $contact->title }}</td>
                                    <td class="border-t-2 border-gray-200 px-4 py-3">{{ $contact->created_at->format('Y-m-d') }}</td>
                                    <td class="border-t-2 border-gray-200 px-4 py-3"><a class="text-blue-500" href="{{ route('contacts.show', ['id' => $contact->id]) }}">詳細</a></td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4">
                                        データがありません
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{ $contacts->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>