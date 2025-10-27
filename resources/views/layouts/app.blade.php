<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>QrCodeini Saas</title>
</head>
<body>

    @include('layouts.navbar')
    @yield('content')


    @session('success')
            <script>
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "{{ session('success') }}",
                    showConfirmButton: false,
                    timer: 2500
                });
            </script>
        @endsession
        @session('error')
            <script>
                Swal.fire({
                    position: "top-end",
                    icon: "error",
                    title: "{{ session('error') }}",
                    showConfirmButton: false,
                    timer: 2500
                });
            </script>
        @endsession
        @session('info')
            <script>
                Swal.fire({
                    position: "top-end",
                    icon: "info",
                    title: "{{ session('info') }}",
                    showConfirmButton: false,
                    timer: 2500
                });
            </script>
        @endsession
        <script>
            //function to delete items: qrcodes, plans, users...
            function deleteItem(id) {
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById(id).submit();
                    }
                });
            }
        </script>
        <!-- Custom JS -->
        @yield('scripts')
</body>
</html>