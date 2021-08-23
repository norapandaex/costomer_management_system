<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>CostomerManagementSystem</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
        <script src="https://kit.fontawesome.com/46a52c0f8c.js" crossorigin="anonymous"></script>
        
        {{--Datatables--}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.1.8/css/fixedHeader.bootstrap4.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://cdn.datatables.net/fixedheader/3.1.8/js/dataTables.fixedHeader.min.js"></script>
        <style>
            /* 振り込み */
            .modalArea {
                display: none;
                position: fixed;
                z-index: 10;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
            }
        
            .modalBg {
                width: 100%;
                height: 100%;
                background-color: rgba(30,30,30,0.9);
            }
        
            .modalWrapper {
                position: absolute;
                top: 50%;
                left: 50%;
                transform:translate(-50%,-50%);
                width: 70%;
                max-width: 500px;
                padding: 10px 30px;
                background-color: #fff;
            }
        
            .closeModal {
                position: absolute;
                top: 0.5rem;
                right: 1rem;
                cursor: pointer;
            }
        </style>
    @yield('js')
          
    </head>

    <body>
        <header class="mb-4">
            <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
                <a class="navbar-brand" href="/">顧客管理システム</a>
            </nav>
        </header>

        <div class="container">
            @yield('content')
        </div>


        <script src="{{ asset('/js/datatables.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
    </body>
</html>
