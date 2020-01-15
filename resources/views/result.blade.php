@extends('layouts.app')

@section('style')
<style>

</style>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        Results Found {{ count($communitiesList) }}
        <br>

        @if(count($communitiesList))
            @foreach ($communitiesList as $community)
                <div class="card d-flex flex-row mt-1 mb-2 w-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $community['name'] }}</h5>
                        <p class="card-text">{{ $community['desc'] }}</p>
                        @if(count($community['links']))

                            @foreach ($community['links'] as $link)
                            <a href="#" class="btn btn-primary">{{ $link['rel'] }}</a>
                            @endforeach
                           
                            @if(count($community['links']) > 2)
                                <a href="#" class="btn btn-primary">More</a>
                            @endif
                        @else    
                                <a href="#" class="btn btn-primary">Report group admin</a>
                        @endif
                    </div>
                    <div class="card">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">{{ $community['like'] }}</li>
                            <li class="list-group-item">{{ $community['dislike'] }}</li>
                            <li class="list-group-item">id - {{ $community['id'] }}</li>
                        </ul>
                    </div>
                </div>
            @endforeach   
        @else    
            <h1>no result</h1>
        @endif
        </div>
    </div>
</div>
@endsection