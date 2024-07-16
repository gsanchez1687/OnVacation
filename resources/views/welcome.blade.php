<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Prueba Técnica On Vacation</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    </head>
    <body class="antialiased">
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        <a href="{{ url('/home') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div>
               @php
                function checkQuestionMark($string) {
                    $longitud = strlen($string);
                    $num = [];
                    for ($i = 0; $i < $longitud; $i++) {
                        if (is_numeric($string[$i])) {
                            $actual = intval($string[$i]);
                            if (!empty($num)) {
                                foreach ($num as $preview) {
                                    if ($actual + $preview['numero'] == 10) {
                                        $signosInterrogacion = substr_count($string, '?', $preview['posicion'] + 1, $i - $preview['posicion'] - 1);
                                        if ($signosInterrogacion != 3) {
                                            return "false";
                                        }
                                    }
                                }
                            }
                            $num[] = ['numero' => $actual, 'posicion' => $i];
                        }
                    }
                    
                    foreach ($num as $preview) {
                        foreach ($num as $actual) {
                            if ($actual['posicion'] > $preview['posicion'] && $actual['numero'] + $preview['numero'] == 10) {
                                return "true";
                            }
                        }
                    }
                    
                    return "false";
                }

                echo checkQuestionMark("aa6?9");
                echo "\n";
                echo checkQuestionMark("acc?7??sss?3rr1??????5");
                echo "\n";
                echo checkQuestionMark("arrb6???4xxbl5???eee5");
                
               @endphp
            </div><!--fin-->
            <div>
                @php
                    function sumMinMaxMatriz($matriz) {
                        $min = $matriz[0][0];
                        $max = $matriz[0][0];
                        foreach ($matriz as $fila) {
                            foreach ($fila as $numero) {
                                if ($numero < $min) {
                                    $min = $numero;
                                }
                                if ($numero > $max) {
                                    $max = $numero;
                                }
                            }
                        }
                        $suma = $min + $max;
                        echo "La suma del número mínimo y máximo es: " . $suma;
                    }
                    $matriz = [
                        [2, 5, 4],
                        [6, 2, 11],
                        [4, 1, 8],
                        [10, 22, 45]
                    ];
                    echo sumMinMaxMatriz($matriz)

                @endphp
            </div>
            <div>
                @php
                function calcularComision($ventas, $meta) {
                    $cumplimiento = ($ventas / $meta) * 100;
                    $Comision = 0;

                    if ($cumplimiento <= 100) {
                        $Comision = $cumplimiento;
                    } else {
                        if ($cumplimiento > 120 && $cumplimiento <= 125) {
                            $Comision = 102;
                        } elseif ($cumplimiento > 125 && $cumplimiento <= 130) {
                            $Comision = 103;
                        } elseif ($cumplimiento > 130 && $cumplimiento <= 149) {
                            $Comision = 104;
                        } elseif ($cumplimiento > 149) {
                            $Comision = 105;
                        }
                    }

                    $comisionFinal = ($Comision / 100) * $ventas;
                    return $comisionFinal;
                }
                echo calcularComision(100, 80);
                @endphp
            </div>
        </div>
    </body>
</html>
