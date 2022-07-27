<x-guest-layout>
        <div>
            <h1 class="text-xl text-center m-0.5">{{$article->title }}</h1>
            <br/>
            <p class="text-center">{{$article->content }} </p>
            @foreach($comments as $comment)
                <div>{{$comment->content}}</div>
            @endforeach
        </div>
</x-guest-layout>
