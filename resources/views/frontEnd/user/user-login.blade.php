@extends('frontEnd.master')
@section('title')
    contact-Detail
@endsection
@section('content')
    <section id="contact" class="contact mb-5">
        <div class="container" data-aos="fade-up">

            <div class="row">
                <div class="col-lg-12 text-center mb-5">
                    <h1 class="page-title">Login</h1>
                    <h1 class="page-title">{{ Session('message') }}</h1>
                </div>
            </div>


            <div class="mt-2 col-md-8 m-auto">
                <form action="{{route('user.login')}}" method="post" class="php-email-form">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-12">
                            <input type="text" class="form-control" name="user_name" id="email" placeholder="Enter Your phone or Email" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" id="password" placeholder="password" required>
                    </div>


                    <div class="text-center">
                        <button style="box-shadow: 0 0 0 .25rem rgba(9, 133, 21, 0.507); background-color: #12bf24;" type="submit" class="btn btn-success">Login</button>
                    </div>

                </form>
            </div><!-- End Contact Form -->

        </div>
    </section>

@endsection
