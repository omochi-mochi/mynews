@extends('layouts.profile')
@section('title', 'Myプロフィール')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>プロフィール</h2>
                
                {{--氏名欄--}}
                <div class="row">
                    <div class="col-md-3">氏名</div>
                    <div class="col-md-6 col-md-offset-3">{{ $profile->name }}</div>
                </div>
                
                {{--性別--}}
                <div class="row">
                    <div class="col-md-3">性別</div>
                    <div class="col-md-6 col-md-offset-3">
                        @if($profile->gender=="man")
                            男性
                        @else($profile->gender=="woman")
                            女性
                        @endif
                     </div>
                </div>
                
                {{--趣味--}}
                <div class="row">
                    <div class="col-md-3">趣味</div>
                    <div class="col-md-6 col-md-offset-3">{{ $profile->hobby }}</div>
                </div>
                
                {{--自己紹介--}}
                <div class="row">
                    <div class="col-md-3">自己紹介</div>
                    <div class="col-md-6 col-md-offset-3">{{ $profile->introduction }}</div>

                </div>
                
            </div>
        </div>
    </div>
@endsection