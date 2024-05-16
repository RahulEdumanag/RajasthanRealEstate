<!doctype html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr"
    data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template">

<head>
    @include('backend.layouts.head')
</head>
<style>
    .preloader {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: #9086f4;
        z-index: 999999;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .spinner {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        border: 4px solid transparent;
        border-top-color: #ffffff;
        /* Spinner color */
        animation: spin 0.9s linear infinite;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }
</style>

<body>
    <div class="preloader">
        <div class="spinner">
            <div class="double-bounce1"></div>
            <div class="double-bounce2"></div>
        </div>
    </div>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            @include('backend.layouts.sidebar')
            <div class="layout-page">
                @include('backend.layouts.topbar')

                <div class="content-wrapper">

                    <div class="container-xxl flex-grow-1 container-p-y">

                        @yield('content')

                    </div>
                </div>
                @include('backend.layouts.footer')
            </div>


            <div class="app-wrapper-footer">

                @include('backend.layouts.modal')

            </div>
        </div>
    </div>
</body>

</html>
<script>
    $(window).on('load', function() {
        $('.preloader').fadeOut();
    });
</script>
