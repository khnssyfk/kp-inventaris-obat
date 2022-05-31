<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $title }} | RM Melife</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        
        <!-- Vendors -->
        {{-- <link rel="stylesheet" href="{{ asset('/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
        <link rel="stylesheet" href="{{ asset('/vendors/bootstrap-icons/bootstrap-icons.css') }}"> --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
        
        {{-- <link rel="stylesheet" href="/vendors/perfect-scrollbar/perfect-scrollbar.css"> --}}
        {{-- <link rel="stylesheet" href="/css/sweetalert2.min.css">  --}}
   
        <!-- Styles -->
        <link rel="stylesheet" href="/css/bootstrap.css"> 
        <link rel="stylesheet" href="/css/app.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.css"/>

        
        {{-- favicon --}}
        <link rel="icon"  href="/images/favicon.ico">
        
        {{-- datatable css --}}
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
        {{-- jQuery --}}
        <script src="https://code.jquery.com/jquery-3.1.0.js"></script>

        {{-- datatable js --}}

        <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
  

        
        
    </head>
    <body>
        <div id="app">
            @include('sweetalert::alert')
            @include('layouts.partials.sidebar')
            <div id="main" class='layout-navbar'>
                @include('layouts.partials.header')
                <div id="main-content">
                    @yield('container')
                    @include('layouts.partials.footer')
                </div>
            </div>
        </div>
        <script src="/js/app.js"></script>
        <script src="/js/main.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
        {{-- <script src="/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script> --}}
        <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
        </script>
        
        


    </body>

</html>