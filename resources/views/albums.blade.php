@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    ALBUMS
                </div>

                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Number</th>
                            <th>Name</th>
                            <th>Photos</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $count = 1 ?>
                        @forelse ($albums as $key)
                            <tr>
                                <td>{{$count}}</td>
                                <td><a href="{{URL::current()}}/{{ $key->id }}">{{ $key->name }}</a></td>
                                <td>{{$key->amount}}</td>
                                <td>
                                    <button class="btn btn-danger delete-album" album="{{ $key->id }}"
                                            token="{{ csrf_token() }}">DELETE
                                    </button>
                                </td>
                            </tr>
                            <?php $count++ ?>
                        @empty
                            <p>No albums</p>
                        @endforelse
                        </tbody>
                    </table>

                    <!-- Add Button -->
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-default show-album">
                                <i class="fa fa-btn fa-plus"></i>Add Album
                            </button>
                        </div>
                    </div>

                </div>
                <div class="form-area">
                    <?= Form::open(['url' => '/albums', 'id' => 'add-album']) ?>
                    <div class="form-group">
                        <?= Form::label('album', 'New album')?>
                        <?= Form::text('album', null, ['class' => 'form-control input-album'])?>
                    </div>
                    <?= Form::submit('Submit', ['class' => 'form-control submit-album'])?>
                    <?= Form::close()?>
                </div>
            </div>

        </div>
    </div>
@endsection