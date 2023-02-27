@extends('admin.master')
@section('content')

    <div class="row">
        <div class="col-xl-9 mx-auto">
            <div class="card">
                <div class="card-body">
                    <div class="border p-4 rounded">
                        <div class="card-title d-flex align-items-center">
                            <h5 class="mb-0">Category Name</h5>
                        </div>
                        <hr/>
                        <form action="{{ route('new.category') }}" method="post">
                            @csrf

                        <div class="row mb-3">
                            <label for="inputEnterYourName" class="col-sm-3 col-form-label">category_name</label>
                            <div class="col-sm-9">
                                <input type="text" name="category_name" class="form-control" id="inputEnterYourName" placeholder="Enter Your Name">
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-primary px-5">Submit</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-9 mx-auto">
            <div class="card">
                <div class="card-body">
                    <div class="border p-4 rounded">
                        <div class="card-title d-flex align-items-center">
                            <h5 class="mb-0">Manage Category</h5>
                        </div>
                        <hr/>
                        <table class="table table-hover table-striped">
                            <tr>
                                <th>sl</th>
                                <th>category name</th>
                                <th>status</th>
                                <th>Action</th>
                            </tr>
                            @php $i=1 @endphp
                            @foreach($categories as $category)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $category->category_name}}</td>
                                <td>{{ $category->status ==1 ? 'published' : 'unpublished' }}</td>
                            <td>
                                <a href="" class="btn btn-primary btn-sm">Edit</a>
                                <a href="" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                            </tr>
                            @endforeach
                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
