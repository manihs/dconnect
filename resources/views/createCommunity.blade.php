@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Community</div>

                <div class="card-body">
                    <form action="{{ route('newCommunityCreate') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="_cname" class="form-control" placeholder="Community Name">
                        </div>
                        <div class="form-group">
                            <input type="text" name="_cdescription" class="form-control" placeholder="Community Description">
                        </div>
                        <div class="form-group">
                            <input type="text" name="tagslist" class="form-control" placeholder="use commas to seperate">
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
