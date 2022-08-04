<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="justify-self-center">
                <h1 class="text-2xl"> Modifier l'article N° {{$article->id}}</h1>

                <form method="post" action="{{ route('article.save', $article) }}">
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
                            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="title">
                                titre
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input name="title" maxlength="100" required
                                   class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                                   id="inline-password" type="text" value="{{ old('title', $article->title)}}">
                        </div>
                    </div>
                    <div class="md:flex md:items-center mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="contents">
                                Contenu
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input name="contents" maxlength="2000" required
                                   class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                                   type="text" value="{{ old('contents', $article->content) }}">
                        </div>
                    </div>
                    <div>
                        <button class="text-black  bg-gray-400 text-center font-bold py-2 px-4 rounded" type="submit">
                            Envoyer
                        </button>
                    </div>
                </form>
                <br/>
                <h2 class="text-2xl text-center m-10">Commentaires</h2>
                <div>
                    @foreach($article->comments as $comment)
                        @if($comment->guest_pseudo)
                        <div> Ecris par : {{$comment->guest_pseudo}}</div>
                        @else
                            <div> Ecris par : {{$comment->user->firstname}}</div>
                        @endif
                       <div>{{ Str:: limit($comment->content , 100)}}
                           <a href="{{'/dashboard/commentmodify/'.$comment->id}}" class="text-green-600 font-bold py-2 px-4"> Modifier</a>
                           <a href="{{'/dashboard/commentdelete/'.$comment->id}}" class="text-red-600 font-bold py-2 px-4"> Supprimer</a>
                       </div>
                        <br/>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
