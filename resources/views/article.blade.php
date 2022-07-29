<x-guest-layout>
        <div>
            <h1 class="text-xl text-center m-0.5">{{$article->title }}</h1>
            <br/>
            <p>Ecris par {{$article->user->firstname }}</p>
            <p>{{ $article->created_at->diffForHumans() }}</p>
            <br/>
            <p class="text-center">{{$article->content }} </p>

            <div>{{$article->comments_count }} Commentaires</div>
            <br/>
            @foreach($article->comments as $comment)

                @if ( $comment->user_id == null)
                    <p>pseudo : {{$comment->guest_pseudo}}</p>
                @else
                    <p>Utilisateur : {{$comment->user->firstname}}</p>
                @endif
                    <p>{{$comment->content}}</p>
                <br/>
            @endforeach
        </div>
    @if(session('status'))
        <div class="text-green-600	">
            {{ session('status') }}
        </div>
    @endif

        <form class="w-full max-w-sm" method="post" action="{{ route('comment.store')}}">
            @csrf
            @guest
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="pseudo">
                        Pseudo
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input id="pseudo" name="guest_pseudo" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-full-name" type="text" required value="Jane Doe">
                </div>
            </div>
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-password">
                        email
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input name="guest_mail" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-password" type="email" placeholder="tonton@gmail.com">
                </div>
            </div>
            @endguest
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="contents">
                        commentaire
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input id="contents" name="contents" maxlength="2000" required class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-password" type="text" placeholder="votre commentaire">
                </div>
            </div>
            <input type="hidden" name="article_id" value="{{$article->id}}">
            <div class="md:flex md:items-center">
                <div class="md:w-1/3"></div>
                <div class="md:w-2/3">
                    <button class="text-black text-center bg-gray-400  font-bold py-2 px-4 rounded" type="submit">
                        Envoyer
                    </button>
                </div>
            </div>
        </form>
</x-guest-layout>
