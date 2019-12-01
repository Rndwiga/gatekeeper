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
                                <h3 class="mb-0">{{ __('Media Library') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route(config('writter.routes.profile.administrate.create')) }}" class="btn btn-sm btn-primary">{{ __('Create post') }}</a>
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

                    <div class="col-12">

                    </div>
                </div>
            </div>
        </div>

        @include(config('writter.views.layouts.partials.footers.auth'))
    </div>
@endsection
