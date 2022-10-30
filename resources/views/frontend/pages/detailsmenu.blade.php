@extends('frontend.master')
 @section('content')
 <style>
    .headline {
        font-size: 1rem;
        border-bottom: 1px solid #e4e4e4;
        padding: 3px 15px 4px 15px;
    }

    .link {
        color: #333;
        line-height: 1.9em;
        display: block;
    }

    .link:hover {
        text-decoration: none;
    }

    .right-arrow-class {
        vertical-align: 1px;
        color: #5c5c5c;
    }

    .first-content {
        display: inline-block;
        padding-bottom: 4px;
        font-size: 1.2em;
        width: 100%;
        font-weight: 600;
    }

    .first-content {
        color: #333;
        line-height: 1.9em;
    }

    .first-content:hover {
        text-decoration: none;
    }

    .content {
        color: #333;
        line-height: 1.9em;
        display: block;
    }

    .content:hover {
        text-decoration: none;
    }
</style>
 <section class="container">
    <h6 class="headline mt-2">
        <a href="http://" class="link">
            {{ $subject->category->menu->name }}
            <span class="right-arrow-class"> > </span>
            {{ $subject->category->name }}
            <span class="right-arrow-class"> > </span>
            {{ $subject->name }}
        </a>
    </h6>
    <div class="row">
        @foreach ($data as $menu )
            <div class="col-4">
                <a href="#" class="first-content">{{ $menu->name }}</a> <br>
                @foreach ($menu->subsubcategories as $submenu )
                <a href="{{route('get-subcat-details',[ $submenu->type, $submenu->id])}}" class="content">{{ $submenu->name }}</a> <br>
                @endforeach
            </div>
        @endforeach


    </div>
</section>
 @endsection
