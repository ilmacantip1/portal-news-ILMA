@extends('layouts.master')

@section('content')
<div class="container paddding" style="height: 80vh">
    @auth
    @if (session('suuccess'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <a href="/profile" class="btn btn-primary btn-lg my-5">Edit Profile</a>
        <div class="row mx-0">
            <div class="col-4">
                @if ($profile->photo_profile)
                <img src="{{asset('/uploads/profile/' . $profile->photo_profile)}}" 
                class="rounded-circle" alt="Cinque Terre" width="304" height="236">
                <ul class="my-5">
                    @forelse ($profile->user->news as $item)
                        <li class=""> <a class="text-primary" 
                        href="/news/detail/{{$item->id}}">{{$item->title}}</a> </li>
                    @empty
                        <li class="">Belum ada berita yang di komentari</li>
                    @endforelse
                </ul>

                {{-- <ul class="my-5">
                    @forelse ($profile->user->comment as $item)
                        <li class=""> <a class="text-primary" 
                        href="/comment/detail/{{$item->id}}">{{$item->title}}</a> </li>
                    @empty
                        <li class="">Belum ada reply yang di komentari</li>
                    @endforelse
                </ul> --}}

                @else 
                <img src="https://dummyimage.com/480x320/000/fff"
                class="rounded-circle" alt="Cinque Terre" width="304" height="236">
                @endif 
            </div>
            <div class="col-8">
                <h1>{{$profile->user->name}} ({{$profile->age}})</h1>
                <small>{{$profile->user->email}}</small>
                <h3>Biodata saya adalah</h3>
                <p>
                    {{$profile->bio}}
                </p>
            </div>
        </div>
    @endauth

    @guest
        <h1>BELUM lOGIN</h1>
    @endguest
</div>
@endsection
