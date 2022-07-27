<x-guest-layout>
    @foreach($articles as $article)
        <div>
        <h1 class="text-2xl text-center m-0.5"><a class="hover:bg-red-700" href="{{$article->id}}">{{$article->title }}</a></h1>
            <p>{{ $article->created_at->diffForHumans() }}</p>
        <p class="text-center">{{Str::limit($article->content, 500)}} </p>
            <br/>
        </div>
        <div>{{ $article->comments_count }} Commentaires</div>
    @endforeach
    {{ $articles->links() }}
</x-guest-layout>






