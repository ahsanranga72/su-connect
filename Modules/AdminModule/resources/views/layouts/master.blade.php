<!doctype html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets') }}/logo.png" />
        <title>@yield('page_title')</title>
        <link id="style" href="{{ asset('assets/admin-module') }}/plugins/bootstrap/css/bootstrap.min.css"
            rel="stylesheet" />
        <link href="{{ asset('assets/admin-module') }}/css/style.css" rel="stylesheet" />
        <link href="{{ asset('assets/admin-module') }}/css/dark-style.css" rel="stylesheet" />
        <link href="{{ asset('assets/admin-module') }}/css/transparent-style.css" rel="stylesheet">
        <link href="{{ asset('assets/admin-module') }}/css/skin-modes.css" rel="stylesheet" />
        <link href="{{ asset('assets/admin-module') }}/css/icons.css" rel="stylesheet" />
        <link id="theme" rel="stylesheet" type="text/css" media="all"
            href="{{ asset('assets/admin-module') }}/colors/color1.css" />

        <link href="{{ asset('assets/admin-module') }}/css/toastr.min.css" rel="stylesheet">

        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="base-url" content="{{ url('/') }}">
        @stack('page_css')
        <style>
            #global-loader {
                background: transparent !important;
            }
        </style>
        <style>
            /* width */
            ::-webkit-scrollbar {
                width: 7px;
            }

            /* Track */
            ::-webkit-scrollbar-track {
                background: #f1f1f1;
            }

            /* Handle */
            ::-webkit-scrollbar-thumb {
                background: #a7a7a7;
            }

            /* Handle on hover */
            ::-webkit-scrollbar-thumb:hover {
                background: #929292;
            }

            ul {
                margin: 0;
                padding: 0;
            }

            li {
                list-style: none;
            }

            .user-wrapper,
            .message-wrapper {
                border: 1px solid #dddddd;
                overflow-y: auto;
            }

            .user-wrapper {
                height: 600px;
            }

            .user {
                cursor: pointer;
                padding: 5px 0;
                position: relative;
            }

            .user:hover {
                background: #eeeeee;
            }

            .user:last-child {
                margin-bottom: 0;
            }

            .pending {
                position: absolute;
                left: 13px;
                top: 9px;
                background: #b600ff;
                margin: 0;
                border-radius: 50%;
                width: 18px;
                height: 18px;
                line-height: 18px;
                padding-left: 5px;
                color: #ffffff;
                font-size: 12px;
            }

            .media-left {
                margin: 0 10px;
            }

            .media-left img {
                width: 64px;
                border-radius: 64px;
            }

            .media-body p {
                margin: 6px 0;
            }

            .message-wrapper {
                padding: 10px;
                height: 536px;
                background: #eeeeee;
            }

            .messages .message {
                margin-bottom: 15px;
            }

            .messages .message:last-child {
                margin-bottom: 0;
            }

            .received,
            .sent {
                width: 45%;
                padding: 3px 10px;
                border-radius: 10px;
            }

            .received {
                background: #ffffff;
            }

            .sent {
                background: #3bebff;
                float: right;
                text-align: right;
            }

            .message p {
                margin: 5px 0;
            }

            .date {
                color: #777777;
                font-size: 12px;
            }

            .active {
                background: #eeeeee;
            }

            input[type=text] {
                width: 100%;
                padding: 12px 20px;
                margin: 15px 0 0 0;
                display: inline-block;
                border-radius: 4px;
                box-sizing: border-box;
                outline: none;
                border: 1px solid #cccccc;
            }

            input[type=text]:focus {
                border: 1px solid #aaaaaa;
            }
        </style>
    </head>

    <body class="app sidebar-mini ltr light-mode">

        {{-- loader --}}
        <!-- GLOBAL-LOADER -->
        <div id="global-loader">
            <img src="{{ asset('assets/admin-module') }}/images/loader.svg" class="loader-img" alt="Loader">
        </div>
        <!-- /GLOBAL-LOADER -->
        {{-- loader --}}

        <!-- PAGE -->
        <div class="page">
            <div class="page-main">

                {{-- header --}}
                @include('adminmodule::layouts.partials._header')
                {{-- header --}}

                {{-- sidebar --}}
                @include('adminmodule::layouts.partials._sidebar')
                {{-- sidebar --}}

                <!--app-content open-->
                <div class="main-content app-content mt-0">
                    <div class="side-app">

                        <!-- CONTAINER -->
                        <div class="main-container container-fluid" style="margin-top: 6rem;">
                            {{-- page title --}}
                            <div class="page-header">
                                <h1 class="page-title">@yield('page_title')</h1>
                                <div>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a
                                                href="{{ route('admin.dashboard') }}">Dashboard</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page"
                                            href="{{ url()->current() }}">@yield('page_title')</li>
                                    </ol>
                                </div>
                            </div>
                            {{-- page title --}}

                            {{-- main content --}}
                            @yield('main_content')
                            {{-- main content --}}
                        </div>
                        <!-- CONTAINER END -->
                    </div>
                </div>
                <!--app-content close-->
            </div>
            <!-- FOOTER -->
            <footer class="footer">
                <div class="container">
                    <div class="row align-items-center flex-row-reverse">
                        <div class="col-md-12 col-sm-12 text-center">
                            All Rights Reserved by <a href="/">us</a>.
                        </div>
                    </div>
                </div>
            </footer>
            <!-- FOOTER END -->

        </div>

        <!-- BACK-TO-TOP -->
        <a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

        <!-- JQUERY JS -->
        <script src="{{ asset('assets/admin-module') }}/js/jquery.min.js"></script>
        <!-- BOOTSTRAP JS -->
        <script src="{{ asset('assets/admin-module') }}/plugins/bootstrap/js/popper.min.js"></script>
        <script src="{{ asset('assets/admin-module') }}/plugins/bootstrap/js/bootstrap.min.js"></script>
        <!-- SIDEBAR JS -->
        <script src="{{ asset('assets/admin-module') }}/plugins/sidebar/sidebar.js"></script>

        @stack('script')

        <!-- INTERNAL SELECT2 JS -->
        <script src="{{ asset('assets/admin-module') }}/plugins/select2/select2.full.min.js"></script>

        <!-- SIDE-MENU JS-->
        <script src="{{ asset('assets/admin-module') }}/plugins/sidemenu/sidemenu.js"></script>

        <!-- INTERNAL INDEX JS -->
        <script src="{{ asset('assets/admin-module') }}/js/index1.js"></script>
        <!-- Color Theme js -->
        <script src="{{ asset('assets/admin-module') }}/js/themeColors.js"></script>
        <!-- CUSTOM JS -->
        <script src="{{ asset('assets/admin-module') }}/js/custom.js"></script>

        <!-- SWEET-ALERT JS -->
        <script src="{{ asset('assets/admin-module') }}/plugins/sweet-alert/sweetalert.min.js"></script>
        <script src="{{ asset('assets/admin-module') }}/js/sweet-alert.js"></script>

        {{-- globally used --}}
        <script src="{{ asset('assets/admin-module') }}/custom-js/global.js"></script>
        <script src="{{ asset('assets/admin-module') }}/custom-js/admin.js"></script>

        <script src="{{ asset('assets/admin-module') }}/custom-js/toastr.min.js"></script>
        {{-- toastr --}}
        <script>
            "use strict";
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    toastr.error('{{ $error }}');
                @endforeach
            @endif

            @if (session()->has('success'))
                toastr.success('{{ session('success') }}');
            @endif

            @if (session()->has('info'))
                toastr.info('{{ session('info') }}');
            @endif

            @if (session()->has('warning'))
                toastr.warning('{{ session('warning') }}');
            @endif

            @if (session()->has('error'))
                toastr.error('{{ session('error') }}');
            @endif

            function alert_function(id) {
                "use strict";
                swal({
                    title: "Are you sure ?",
                    text: "",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#028088",
                    confirmButtonText: "Yes",
                    cancelButtonText: "No",
                    closeOnConfirm: false,
                    closeOnCancel: true
                }, function(isConfirm) {
                    if (isConfirm) {
                        jQuery('#' + id).submit();
                    }

                    return false;
                })
            }
        </script>
        <script src="https://js.pusher.com/5.0/pusher.min.js"></script>
        <script>
            var receiver_id = '';
            var my_id = "{{ auth()->id() }}";
            $(document).ready(function() {
                // ajax setup form csrf token
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                // Enable pusher logging - don't include this in production
                Pusher.logToConsole = true;
                var pusher = new Pusher('984ed3922289f8033038', {
                    cluster: 'ap2'
                });
                var channelName = "<?php echo 'notify-channel'; ?>";
                //var channelName =  'notify-channel';
                var status = $('#id').val();
                var channel = pusher.subscribe('notify-channel');
                channel.bind('App\\Events\\Notify', function(data) {
                    //  alert(JSON.stringify(data));
                    if (my_id == data.from) {
                        $('#' + data.to).click();
                    } else if (my_id == data.to) {
                        if (receiver_id == data.from) {
                            // if receiver is selected, reload the selected user ...
                            $('#' + data.from).click();
                        } else {
                            // if receiver is not seleted, add notification for that user
                            var pending = parseInt($('#' + data.from).find('.pending').html());

                            if (pending) {
                                $('#' + data.from).find('.pending').html(pending + 1);
                            } else {
                                $('#' + data.from).append('<span class="pending">1</span>');
                            }
                        }
                    }
                });

                $('.user').click(function() {
                    $('.user').removeClass('active');
                    $(this).addClass('active');
                    $(this).find('.pending').remove();

                    receiver_id = $(this).attr('id');
                    // alert("receiver_id");
                    $.ajax({
                        type: "get",
                        url: "message/" + receiver_id, // need to create this route
                        data: "",
                        cache: false,
                        success: function(data) {
                            $('#messages').html(data);
                            scrollToBottomFunc();
                            //alert("receiver_id");
                        }
                    });
                });

                $(document).on('keyup', '.input-text input', function(e) {
                    var message = $(this).val();

                    // check if enter key is pressed and message is not null also receiver is selected
                    if (e.keyCode == 13 && message != '' && receiver_id != '') {
                        $(this).val(''); // while pressed enter text box will be empty

                        var datastr = "receiver_id=" + receiver_id + "&message=" + message;
                        $.ajax({
                            type: "post",
                            url: "message", // need to create this post route
                            data: datastr,
                            cache: false,
                            success: function(data) {

                            },
                            error: function(jqXHR, status, err) {},
                            complete: function() {
                                scrollToBottomFunc();
                            }
                        })
                    }
                });
            });

            // make a function to scroll down auto
            function scrollToBottomFunc() {
                $('.message-wrapper').animate({
                    scrollTop: $('.message-wrapper').get(0).scrollHeight
                }, 50);
            }
        </script>
        @stack('page_js')
    </body>

</html>
