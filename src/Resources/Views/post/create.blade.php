@extends(config('writter.views.layouts.admin'), ['title' => __('Post Management')])

@section('content')
    @include(config('writter.views.pages.users.partials.header'), ['title' => __('Add Post')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Post Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route(config('writter.routes.post.index')) }}" class="btn btn-sm btn-primary">{{ __('Back to posts') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route(config('writter.routes.post.store'),'new') }}" autocomplete="off">
                            @csrf

                            <h6 class="heading-small text-muted mb-4">{{ __('Post details') }}</h6>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card-wrapper">
                                        <!-- Input groups -->
                                        <div class="card">
                                            <!-- Card body -->
                                            <div class="card-body">
                                                <form>
                                                    <!-- Input groups with icon -->
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <div class="input-group input-group-merge">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="fas fa-clipboard"></i></span>
                                                                    </div>
                                                                    <input class="form-control" name="post_title" placeholder="Post Title" type="text" value="Post Title">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <div class="input-group input-group-merge">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="fas fa-typo3"></i></span>
                                                                    </div>
                                                                    <select class="form-control" name="post_category" data-toggle="select">
                                                                        <option>Post Type</option>
                                                                        <option>Tech</option>
                                                                        <option>Finance</option>
                                                                        <option>Blog</option>
                                                                        <option>Digital Marketing</option>
                                                                        <option>SEO Solutions (shop)</option>
                                                                        <option>Guest</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <div class="input-group input-group-merge">
                                                                    <input class="form-control datepicker" name="post_publish_date" data-date-format="yyyy-mm-dd" placeholder="Select date published" type="text" value="2019-01-01">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <div class="input-group input-group-merge">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="fas fa-angle-down"></i></span>
                                                                    </div>
                                                                    <select class="form-control" name="post_status" data-toggle="select">
                                                                        <option>Select Post Status</option>
                                                                        <option>Draft</option>
                                                                        <option>Publish</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <div class="input-group input-group-merge">
                                                                    <div class="custom-file">
                                                                        <input type="file" class="custom-file-input" name="post_featured_image" id="customFileLang" lang="en">
                                                                        <label class="custom-file-label"  for="customFileLang">Select Featured Image</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <div class="input-group input-group-merge">
                                                                    <input class="form-control" name="post_featured_image_caption" placeholder="Featured image caption" type="text" value="caption">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text"><i class="fas fa-file-image"></i></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <textarea name="post_data" class="form-control" id="post_content"> This is content</textarea>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <textarea name="excerpt" class="form-control" id="post_summary"> This is summary</textarea>
                                                        </div>
                                                    </div>


                                                    <div class="row">
                                                        <div class="col-md-2 offset-5">
                                                            <br>
                                                            <input  class="form-control btn btn-primary"  type="submit" value="Save Post">
                                                        </div>
                                                    </div>

                                                    <!-- Input groups with icon -->
                                                    {{--<div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <div class="input-group input-group-merge">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="fas fa-credit-card"></i></span>
                                                                    </div>
                                                                    <input class="form-control" placeholder="Payment method" type="text">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text"><small class="font-weight-bold">USD</small></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <div class="input-group input-group-merge">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="fas fa-globe-americas"></i></span>
                                                                    </div>
                                                                    <input class="form-control" placeholder="Phone number" type="text">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>--}}
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        @include(config('writter.views.layouts.partials.footers.auth'))
    </div>
@endsection

@push('js')
    <script>
        $('#post_content').summernote({
            placeholder: 'Post content...',
            tabsize: 2,
            height: 200,focus: true
        });
        $('#post_summary').summernote({
            placeholder: 'Post summary...',
            height: 200,
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
            ]
        });
    </script>
@endpush
