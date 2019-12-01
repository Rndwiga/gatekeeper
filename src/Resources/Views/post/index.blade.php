@extends(config('writter.views.layouts.admin'), ['title' => __('User Management')])

@section('content')
    @include(config('writter.views.layouts.partials.headers.cards'))

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Posts') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route(config('writter.routes.post.create')) }}" class="btn btn-sm btn-primary">{{ __('Create post') }}</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Views</th>
                                <th scope="col">Status</th>
                                <th scope="col">Author</th>
                                <th scope="col">Category</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($posts))
                                @foreach($posts as $post)
                                    <tr>
                                        <th scope="row">
                                            <div class="media align-items-center">
                                                <a href="#" class="avatar rounded-circle mr-3">
                                                    <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/bootstrap.jpg">
                                                </a>
                                                <div class="media-body">
                                                    <span class="mb-0 text-sm">{{$post['title']}}</span>
                                                </div>
                                            </div>
                                        </th>
                                        <td>
                                            30 Views
                                        </td>
                                        <td>
                                          <span class="badge badge-dot mr-4">
                                            <i class="bg-warning"></i> {{$post['published'] == 1 ? 'Published':'Draft'}}
                                          </span>
                                        </td>
                                        <td>
                                            <div class="avatar-group">
                                                <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Ryan Tompson">
                                                    <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-1-800x800.jpg" class="rounded-circle">
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge badge-dot mr-4">
                                            <i class="bg-warning"></i> {{$post['category_id']}}
                                          </span>
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a class="dropdown-item" href="#">Edit</a>
                                                    <a class="dropdown-item" href="#">Publish</a>
                                                    <a class="dropdown-item" href="#">UnPublish</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            {{--{{ $users->links() }}--}}
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        @include(config('writter.views.layouts.partials.footers.auth'))
    </div>
@endsection
