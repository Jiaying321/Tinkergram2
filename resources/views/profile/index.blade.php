@extends('layouts.app')

@section('content')

<script src="{{ mix('js/app.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/profile.js') }}"></script>

<div class="container">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-2 pt-3">
        @if($profile != null)
            <img class="rounded-circle" width="150" src="/storage/{{ $profile->image}}">
        @endif
        </div>
        <div class="col-7 pt-3">
            <h3>{{$user->name}}</h3>
            <span><strong>{{$postscount}}</strong> posts</span>
            @if($profile != null)
                <div class="pt-3">{{$profile->description}}</div>
                <a href="/profile/edit" class="pt-3">Update your profile!</a>
            @else
                <div><a href="/profile/create" class="pt-3">Create your profile!</a></div>
            @endif
            <div class="pt-2"><a href="/post/create" class="btn btn-primary">Add a post!</a></div>            
        </div>
        
    </div>

    <div class="row pt-5">
        @foreach($posts as $post)
            <div class="col-4 mb-5" id="post-image">
                <a href="/post/{{$post->id}}">
                    <img src="/storage/{{$post->image}}" class="w-100">
                    <form action="{{route('posts.destroy',$post->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <div class="buttons are-small">
                            <input type="submit" class="button is-danger is-rounded" value="Delete Post!"/>
                        </div>
                    </form>
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection
