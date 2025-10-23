@extends('theme.master')
@section('title', 'Remake Barber - Edit Blog')
@section('content')

    <!--================ Hero sm banner start =================-->
    <section class="mb-5px">
        <div class="container">
            <div class="hero-banner hero-banner--sm">
                <div class="hero-banner__content">
                    <h1>{{ $blog->name }}</h1>
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
                    @if(session('update-blog'))
                        <div class="alert alert-success">
                            {{ session('update-blog') }}
                        </div>
                    @endif

                    <form action="{{ route('blogs.update', ['blog' => $blog]) }}" class="form-contact contact_form"
                          method="post"
                          id="contactForm" novalidate="novalidate" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <input class="form-control border" name="name" id="name" type="text"
                                   placeholder="Enter your blog title" value="{{ $blog->name }}">
                            <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                        </div>

                        <div class="form-group">
                            <input class="form-control border" name="image" type="file">
                            <x-input-error :messages="$errors->get('image')" class="mt-2"/>
                        </div>

                        <div class="form-group">
                            <select class="form-control border" name="category_id" value="{{ old('category_id') }}">
                                <option value="">Select Category</option>
                                @if(count($categories) > 0)
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}"
                                                @if($category->id === $blog->category_id) selected @endif>{{ $category->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                            <x-input-error :messages="$errors->get('category_id')" class="mt-2"/>
                        </div>

                        <div class="form-group">
                            <textarea class="form-control border" name="description" type="text"
                                      placeholder="Enter your blog content"
                                      rows="15">{{ $blog->description }}</textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2"/>
                        </div>

                        <div class="form-group text-center text-md-right mt-3">
                            <button type="submit" class="button button--active button-contactForm">Edit Blog</button>
                        </div>

                    </form>

                </div>

            </div>

        </div>

    </section>
    <!-- ================ contact section end ================= -->
@endsection
