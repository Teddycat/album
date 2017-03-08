@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    PHOTOS OF {{$album}} <a class="link-return" href="/albums">Return to the list of albums</a>
                </div>

                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Number</th>
                            <th>Link</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $count = 1 ?>
                        @foreach($photos as $key)
                            <tr>
                                <td>{{$count}}</td>
                                <td>{{$key->photos_link}}</td>
                                <td>
                                    <button class="btn btn-danger delete-photo" photo="{{ $key->photos_id }}"
                                            token="{{ csrf_token() }}">DELETE
                                    </button>
                                </td>
                            </tr>
                            <?php $count++ ?>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-default show-photo">
                                <i class="fa fa-btn fa-plus"></i>Add Photo
                            </button>
                        </div>
                    </div>
                </div>
                <div class="form-area">
                    <?= Form::open(['url' => '/albums/' . $albumId, 'id' => 'add-photo']) ?>
                    <div class="form-group">
                        <?=  Form::label('link', 'Link')?>
                        <?= Form::text('link', null, ['class' => 'form-control input-photo'])?>
                    </div>
                    <?= Form::hidden('albumId', $albumId)?>
                    <?= Form::submit('Submit', ['class' => 'form-control submit-photo'])?>
                    <?= Form::close()?>
                </div>
            </div>

        </div>
    </div>
@endsection