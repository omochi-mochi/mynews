
    
@extends('layouts.profile')



@section('title', 'プロフィール画面')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>プロフィール作成用画面</h2>
                <form action="{{ action('Admin\ProfileController@create') }}" method="post" enctype="multipart/form-data">
                @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                @endif
                {{--氏名入力欄 --}}
                <div class="form-group row">
                        <label class="col-md-2" for="name">氏名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        </div>
                </div>
                {{--性別選択欄--}}
                <div class="form-group row">
                        <label class="col-md-2" for="gender">性別</label>
                        <div class="col-md-10">
                            <select class="form-control" name="gender">
                                <option value="man" @if(old('gender')=="man") selected @endif >男性</option>
                                <option value="woman" @if(old('gender')=="woman") selected @endif >女性</option>
                            </select>
                        </div>
                </div>
                {{--趣味記入欄--}}
                <div class="form-group row">
                        <label class="col-md-2" for="hobby">趣味</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="hobby" rows="3">{{ old('hobby') }}</textarea>
                        </div>
                </div>
                {{--自己紹介記入欄--}}
                <div class="form-group row">
                        <label class="col-md-2" for="introduction">自己紹介欄</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="introduction" rows="8">{{ old('introduction') }}</textarea>
                        </div>
                </div>
                
                <div class="col-md-10">
                            
                            <input type="hidden" name="user_id" value="{{ $user_id }}">
                </div>
                
                {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="更新">
 
                </form>  
            </div>
        </div>
    </div>
@endsection

