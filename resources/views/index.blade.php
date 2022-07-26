@extends('layouts.app')

@foreach($articles as $article)
<p>{{$article->title }}</p>
    <p>{{$article->content }}</p>
@endforeach
{{}}
