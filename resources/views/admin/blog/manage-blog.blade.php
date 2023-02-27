@extends('admin.master')
@section('content')

    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="card">
                <div class="card-body">
                    <div class="border p-4 rounded">
                        <div class="card-title d-flex align-items-center">
                            <h5 class="mb-0">Manage Category</h5>
                        </div>
                        <hr/>
                        <div class="table-responsive">
                            <table id="example" class="table table-hover table-bordered table-striped">

                               <thead>
                               <tr>
                                   <th>sl</th>
                                   <th>category name</th>
                                   <th>Author name</th>
                                   <th>Title</th>
                                   <th>Slug</th>
                                   <th>Description</th>
                                   <th>Image</th>
                                   <th>Date</th>
                                   <th>Blog Type</th>
                                   <th>Status</th>
                                   <th>Action</th>
                               </tr>
                               </thead>

                                <tbody>
                                <tr>
                                @php $i=1; @endphp

                                @foreach($blogs as $blog)

                                        <td>{{ $i++ }}</td>
                                        <td>{{$blog->category_name}}</td>
                                        <td>{{$blog->author_name}}</td>
                                        <td>{{$blog->title}}</td>
                                        <td>{{$blog->slug}}</td>
                                        <td>{{$blog->description}}</td>
                                        <td>
                                            <img class="img-fluid" src="{{$blog->image}}" alt="">
                                        </td>
                                        <td>{{$blog->date}}</td>
                                        <td>{{$blog->blog_type}}</td>
                                        <td>{{$blog->status == 1 ? 'published' : 'Unpublished'}}</td>
                                        <td class="d-flex">
{{--                                            <table>--}}
{{--                                                <tr>--}}
{{--                                                    <td> <a href="" class="btn btn-primary">Edit</a></td>--}}
{{--                                                    <td>&nbsp;</td>--}}
{{--                                                    <td><a href="" class="btn btn-danger">Delete</a></td>--}}
{{--                                                </tr>--}}
{{--                                            </table>--}}
                                            <a href="" class="btn btn-primary btn-sm">edit</a>
                                            @if($blog->status == 1)
                                            <a href="{{route('status',['id'=>$blog->id])}}" class="btn btn-warning btn-sm">published</a>
                                            @else
                                            <a href="{{route('status',['id'=>$blog->id])}}" class="btn btn-primary btn-sm">unpublished</a>
                                                @endif
                                            <form action="{{route('blog.delete')}}" method="post">
                                                @csrf
                                                <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                                                <button type="submit" onclick="return confirm('Are you sure delete this !!')" class="btn btn-danger btn-sm">delete</button>

                                            </form>



                                        </td>
                                        </tr>
                                        </tbody>

                                @endforeach

                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
