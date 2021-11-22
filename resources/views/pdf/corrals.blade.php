<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            .page-break {
                page-break-after: always;
            }

            .h-100{
                height: 100vh;
            }
            .bg-white{
                background-color: white;
            }
            .mt-5{
                margin-top: 2rem;
            }
            .d-flex{
                display: flex;
            }
            .justify-content-center{
                justify-content: center;
            }
            .align-items-center{
                align-items: center;
            }
            .w-100{
                width: 100%;
            }
            table, th, td {
                border: 1px solid black;
            }

            .bg-danger{
                background-color: red;
            }

        </style>
    </head>
    <body class="">
        <div class="">
            <!-- Page Content -->
            <main class="container h-100 bg-white mt-5 d-flex justify-content-center align-items-center">
                
                <div class="container">
                    @foreach($corrals as $corral)
                        <h1 class="mt-5">Corral: {{ $corral->id }}</h1>
                        <div class="w-100 responsive-table">
                            <table class="table table-dark table-striped">
                                <thead>
                                    <tr>
                                        <th>Age</th>
                                        <th>Dangerous</th>
                                        <th>Corral</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($corral->animals as $animal)
                                        <tr class="@if($animal->dangerous) bg-danger @endif">
                                            <td>{{ $animal->age }}</td>
                                            <td>{{ $animal->dangerous }}</td>
                                            <td>{{ $animal->corral_id }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endforeach
                    <div class="page-break"></div>
                </div>
            </main>
        </div>
    </body>
</html>
