<!DOCTYPE html>
<html>
    <head>
        <title>{{ __('Full-Text Search') }}</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css" integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body>
        <div class="container-lg">
            <h2>{{ __('Full-text search') }}</h2>
            <br />
            <form method="POST" action="{{ route('create-item') }}" autocomplete="off">
                @if(count($errors))
                <div class="alert alert-danger">
                    <strong>{{ __('Whoops!') }}</strong>{{ __('Something went wrong with your input.') }}
                    <br />
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <div class="row">
                    <div class="col">
                        <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                            <input type="text" id="title" name="title" class="form-control" placeholder="{{ __('Enter title') }}" value="{{ old('title') }}" />
                            <span class="text-danger">{{ $errors->first('title') }}</span>
                        </div>
                    </div>
                    <div class="col">
                        <div>
                            <button class="btn btn-success">{{ __('Create new item') }}</button>
                        </div>
                    </div>
                </div>
            </form>
            <div class="panel panel-primary">
                <div class="panel-heading mt-3">{{ __('Item management') }}</div>
                <div class="panel-body">
                    <form method="GET" action="{{ route('items-lists') }}">
                        <div class="row">
                            <div class="col">
                                <div>
                                    <input type="text" name="titlesearch" class="form-control" placeholder="{{ __('Enter a title to search') }}" value="{{ old('titlesearch') }}" />
                                </div>
                            </div>
                            <div class="col">
                                <div>
                                    <button class="btn btn-success">{{ __('Search') }}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <table class="table table-bordered mt-3">
                        <thead>
                            <th>{{ __('ID') }}</th>
                            <th>{{ __('Title') }}</th>
                            <th>{{ __('Created At') }}</th>
                            <th>{{ __('Updated At') }}</th>
                        </thead>
                        <tbody>
                            @if($items->count()) @foreach($items as $key => $item)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->updated_at }}</td>
                            </tr>
                            @endforeach @else
                            <tr>
                                <td colspan="4">{{ __('No Data.') }}</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                    {{ $items->links() }}
                </div>
            </div>
        </div>
    </body>
</html>
