@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Link {{ $cid }}</div>

                <div class="card-body">
                    <form action="{{ route('newCommunitylinkCreate') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="hidden" name="_cid"  value="{{ $cid }}" class="form-control" placeholder="Link">
                        </div>
                        <div class="form-group">
                            <input type="text" name="_lref" class="form-control" placeholder="Enter link type">
                        </div>
                        <!-- <div class="form-group">
                            <select class="form-control" name="_lref">
                            @foreach ($links as $link)
                                <option value="{{ $link->id }}">{{ $link->rel }}</option>
                            @endforeach 
                            </select>
                        </div> -->
                        <div class="form-group">
                            <input type="text" name="_llink" class="form-control" placeholder="Community link">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="form-control">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
