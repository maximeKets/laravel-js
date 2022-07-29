<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <h1 class="text-2xl text-center	">Liste des articles</h1>
                    @if(session('status'))
                        <div class="text-green-600	">
                            {{ session('status') }}

                        </div>
                    @endif
                </div>
            </div>
            <ul>
                @foreach($articles as $article)
                    <li class="m-10"> {{$article->id}} - {{Str::limit($article->title, 50)}} - {{$article->user->firstname}}
                        <a href="{{'/dashboard/articlemodify/'.$article->id}}" class="text-green-600 font-bold py-2 px-4"> Modifier</a>
                        <a href="{{'/dashboard/articledelete/'.$article->id}}" class="text-red-600 font-bold py-2 px-4"> Supprimer</a></li>
                @endforeach

            </ul>

        </div>
    </div>
</x-app-layout>
