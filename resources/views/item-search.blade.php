<!DOCTYPE html>
<html>
    <head>
        <title>全文檢索</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css" integrity="sha512-GQGU0fMMi238uA+a/bdWJfpUGKUkBdgfFdgBm72SUQ6BeyWjoY/ton0tEjH+OSH9iP4Dfh+7HM0I9f5eR0L/4w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body>
        <div class="container-lg">
            <h2>全文檢索</h2>
            <br />
            <form method="POST" action="{{ route('create-item') }}" autocomplete="off">
                @if(count($errors))
                <div class="alert alert-danger">
                    <strong>哎喲！</strong>您的輸入存在一些問題。
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
                            <input type="text" id="title" name="title" class="form-control" placeholder="輸入標題" value="{{ old('title') }}" />
                            <span class="text-danger">{{ $errors->first('title') }}</span>
                        </div>
                    </div>
                    <div class="col">
                        <div>
                            <button class="btn btn-success">建立新項目</button>
                        </div>
                    </div>
                </div>
            </form>
            <div class="panel panel-primary">
                <div class="panel-heading mt-3">項目管理</div>
                <div class="panel-body">
                    <form method="GET" action="{{ route('items-lists') }}">
                        <div class="row">
                            <div class="col">
                                <div>
                                    <input type="text" name="titlesearch" class="form-control" placeholder="輸入標題進行搜尋" value="{{ old('titlesearch') }}" />
                                </div>
                            </div>
                            <div class="col">
                                <div>
                                    <button class="btn btn-success">搜尋</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <table class="table table-bordered mt-3">
                        <thead>
                            <th>編號</th>
                            <th>標題</th>
                            <th>建立時間</th>
                            <th>更新時間</th>
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
                                <td colspan="4">沒有資料。</td>
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
