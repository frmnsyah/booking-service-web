@extends('layouts.template')
@section('content')
<title>Master Data | Booking Service</title>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Data</h6>
    </div>
    <div class="card-body">
        <form action="/master_data/update" method="post">
            @csrf
            <input type="hidden" name="id" value="{{$masterData->id}}">
            <div class="form-group">
                <label for="">Title</label>
                <input type="text" name="title" class="form-control" value="{{$masterData->type}}">
            </div>
            <div class="form-group">
                <label for="">Value</label>
                <input type="text" name="values" class="form-control" value="{{$masterData->values}}">
            </div>
            <input type="submit" value="Update" class="btn btn-warning">
        </form>
    </div>
</div>


@endsection