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

                    <h1 class="text-2xl text-center	">Modifier Commentaire N°{{$comment->id}}</h1>
                    @if(session('status'))
                        <div class="text-green-600	">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>

            <form method="post" action="{{ route('comment.save', $comment) }}">
                @csrf
                @if ($errors->any())
                    <div class="bg-red-200 p-6 text-center rounded shadow">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="contents">
                            Contenu
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <input name="content" maxlength="2000" required
                               class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                               type="text" value="{{ old('content', $comment->content) }}">
                    </div>
                </div>
                <div>
                    <button class="text-black  bg-gray-400 text-center font-bold py-2 px-4 rounded" type="submit">
                        Envoyer
                    </button>
                </div>
            </form>


        </div>
    </div>
</x-app-layout>
