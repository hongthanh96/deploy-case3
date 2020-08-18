@extends('users.layouts')
@section('content')
<style>
    .gird-css{
        /* display: grid;
        grid-template-columns:repeat(4, 400);
        grid-template-rows:repeat(auto-fill, auto);
        grid-gap: 15px;
        grid-auto-flow: column dense; */
        background-color: #f9f7f6;
        padding: 1.5rem;
        grid-gap: 1.5rem;
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        /* grid-template-rows: repeat(7, 7rem); */
    }
    img{
        width: 100%;
        height: auto;
    }
</style>
    {{-- @php
        dd($albums);
    @endphp --}}
    <div>
    @if (isset($album))
        <div>
            <h3 class="text-danger">{{ $album->title}}</h3>
            <p>{{ $album->description }}</p>
        </div>
        <div class="gird-css">
            @foreach ($album->filename as $image)
                <div><img src="../upload/{{ $image }}" alt="" srcset="" ></div>
            @endforeach
            <div><img src="../upload/{{ $image }}" alt="" srcset="" ></div>
            <div ><img src="../upload/{{ $image }}" alt="" srcset="" ></div>
            <div ><img src="../upload/{{ $image }}" alt="" srcset="" ></div>
            <div ><img src="../upload/{{ $image }}" alt="" srcset="" ></div>
            <div ><img src="../upload/{{ $image }}" alt="" srcset="" ></div>
            <div><img src="../upload/{{ $image }}" alt="" srcset="" ></div>
        </div>


    @else
        <div>Không tồn tại album này!!</div>
    @endif
</div>

@endsection
