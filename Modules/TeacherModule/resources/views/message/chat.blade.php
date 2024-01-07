@extends('teachermodule::layouts.master')

@section('page_title', 'Teacher chat')

@push('page_css')
@endpush

@section('main_content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
             <div class="user-wrapper">
                <ul class="users">
                       @foreach($users as $user)
                       <li class="user" id="{{ $user->id }}">
                        {{--will show unread count notification--}}
                            @if($user->unread)
                               <span class="pending">{{ $user->unread }}</span>
                            @endif

                            <div class="media">
                                <div class="media-body">
                                    <p class="name">{{ $user->first_name }}</p>
                                    <p class="email">{{ $user->email }}</p>
                                </div>
                            </div>
                        </li>
                   @endforeach
                </ul>
            </div>
        </div>

        <div class="col-md-8" id="messages">

        </div>
    </div>
</div>
@endsection

@push('page_js')
@endpush
