@extends('theme.master')
@section('title', 'Remake Barber - My Blogs')
@section('content')

    <!--================ Hero sm banner start =================-->
    <section class="mb-5px">
        <div class="container">
            <div class="hero-banner hero-banner--sm">
                <div class="hero-banner__content">
                    <h1>Add new blog</h1>
                </div>
            </div>
        </div>
    </section>
    <!--================ Hero sm banner end =================-->

    <!-- ================ blog section start ================= -->
    <section class="section-margin--small section-margin">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @if(session('delete-blog'))
                        <div class="alert alert-success">
                            {{ session('delete-blog') }}
                        </div>
                    @endif
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col" width="5%">No.</th>
                            <th scope="col">Title</th>
                            <th scope="col" width="15%">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($blogs) > 0)

                            @foreach($blogs as $blog)

                                <tr>
                                    <th scope="row">1</th>
                                    <td>
                                        <a href="{{ route('blogs.show', ['blog' => $blog]) }}"
                                           target="_blank">{{ $blog->name }}</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('blogs.edit', ['blog' => $blog]) }}"
                                           class="btn btn-sm btn-primary mr-2">Edit</a>
                                        <form action="{{ route('blogs.destroy', ['blog' => $blog]) }}" method="post" class="d-inline" id="delete_form">
                                            @csrf
                                            @method('delete')
                                            <a href="javascript:$('form#delete_form').submit();" class="btn btn-sm btn-danger mr-2">Delete</a>
                                        </form>
                                    </td>
                                </tr>

                            @endforeach
                        @endif
                        </tbody>
                    </table>
                    @if(count($blogs) > 0)
                        {{ $blogs->render("pagination::bootstrap-4") }}
                    @endif
                    {{--                    @if(session('success-blog'))--}}
                    {{--                        <div class="alert alert-success">--}}
                    {{--                            {{ session('success-blog') }}--}}
                    {{--                        </div>--}}
                    {{--                    @endif--}}

                    {{--                    <form action="{{ route('blogs.store') }}" class="form-contact contact_form" method="post"--}}
                    {{--                          id="contactForm" novalidate="novalidate" enctype="multipart/form-data">--}}
                    {{--                        @csrf--}}

                    {{--                        <div class="form-group">--}}
                    {{--                            <input class="form-control border" name="name" id="name" type="text"--}}
                    {{--                                   placeholder="Enter your blog title" value="{{ old('name') }}">--}}
                    {{--                            <x-input-error :messages="$errors->get('name')" class="mt-2"/>--}}
                    {{--                        </div>--}}

                    {{--                        <div class="form-group">--}}
                    {{--                            <input class="form-control border" name="image" type="file">--}}
                    {{--                            <x-input-error :messages="$errors->get('image')" class="mt-2"/>--}}
                    {{--                        </div>--}}

                    {{--                        <div class="form-group">--}}
                    {{--                            <select class="form-control border" name="category_id" value="{{ old('category_id') }}">--}}
                    {{--                                <option value="">Select Category</option>--}}
                    {{--                                @if(count($categories) > 0)--}}
                    {{--                                    @foreach($categories as $category)--}}
                    {{--                                        <option value="{{ $category->id }}">{{ $category->name }}</option>--}}
                    {{--                                    @endforeach--}}
                    {{--                                @endif--}}
                    {{--                            </select>--}}
                    {{--                            <x-input-error :messages="$errors->get('category_id')" class="mt-2"/>--}}
                    {{--                        </div>--}}

                    {{--                        <div class="form-group">--}}
                    {{--                            <textarea class="form-control border" name="description" type="text"--}}
                    {{--                                      placeholder="Enter your blog content" rows="15">{{ old('description') }}</textarea>--}}
                    {{--                            <x-input-error :messages="$errors->get('description')" class="mt-2"/>--}}
                    {{--                        </div>--}}

                    {{--                        <div class="form-group text-center text-md-right mt-3">--}}
                    {{--                            <button type="submit" class="button button--active button-contactForm">Create Blog</button>--}}
                    {{--                        </div>--}}

                    {{--                    </form>--}}

                </div>

            </div>

        </div>

    </section>
    <!-- ================ contact section end ================= -->
@endsection
