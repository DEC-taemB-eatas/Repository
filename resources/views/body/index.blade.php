<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <!--This template is based on: https://dribbble.com/shots/6531694-Marketing-Dashboard by Gregoire Vella -->

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Tailwind Starter Template - Minimal Admin Template: Tailwind Toolbox</title>
        <meta name="description" content="description here">
        <meta name="keywords" content="keywords,here">

        <link href="https://fonts.googleapis.com/css?family=Nunito:400,700,800" rel="stylesheet">

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" />
        <!--Replace with your tailwind.css once created-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">

        <style>
            .nunito {
                font-family: 'nunito', font-sans;
            }

            .border-b-1 {
                border-bottom-width: 1px;
            }

            .border-l-1 {
                border-left-width: 1px;
            }

            hover\:border-none:hover {
                border-style: none;
            }

            #sidebar {
                transition: ease-in-out all .3s;
                z-index: 9999;
            }

            #sidebar span {
                opacity: 0;
                position: absolute;
                transition: ease-in-out all .1s;
            }

            #sidebar:hover {
                width: 150px;
                box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
                /*shadow-2xl*/
            }

            #sidebar:hover span {
                opacity: 1;
            }
        </style>

    </head>

    <body class="flex h-screen bg-gray-100 font-sans">

        <!-- Side bar-->


        <div class="flex flex-row flex-wrap flex-1 flex-grow content-start">

            <!--Dash Content -->
            <div id="dash-content" class="bg-gray-200 py-6 lg:py-0 w-full lg:max-w-sm flex flex-wrap content-start ">

                <div class="border-b p-3">
                    <h5 class="font-bold md-6 text-black">Your health points $body['score']['sum']/100</h5>
                    </h5>
                </div>

                <div class="w-sm lg:w-full">
                    <div class="border-2 border-gray-400 border-dashed hover:border-transparent hover:bg-white hover:shadow-xl rounded p-6 m-2 md:mx-10 md:my-6">
                        <div class="flex flex-col items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded-full p-3 bg-gray-300"><i class="fa fa-wallet fa-fw fa-inverse text-indigo-500"></i></div>
                            </div>
                            <div class="flex-1">
                                <h3 class="font-bold text-3xl">{{ $body['score']['eating_habits'] }}/20 <span class="text-green-500"><i class="fas fa-caret-up"></i></span></h3>
                                <h5 class="font-bold text-gray-500">Eating habits</h5>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-1/2 lg:w-full">
                    <div class="border-2 border-gray-400 border-dashed hover:border-transparent hover:bg-white hover:shadow-xl rounded p-6 m-2 md:mx-10 md:my-6">
                        <div class="flex flex-col items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded-full p-3 bg-gray-300"><i class="fas fa-users fa-fw fa-inverse text-indigo-500"></i></div>
                            </div>
                            <div class="flex-1">
                                <h3 class="font-bold text-3xl">{{ $body['score']['eating'] }}/40 <span class="text-orange-500"><i class="fas fa-exchange-alt"></i></span></h3>
                                <h5 class="font-bold text-gray-500">Eating</h5>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-1/2 lg:w-full">
                    <div class="border-2 border-gray-400 border-dashed hover:border-transparent hover:bg-white hover:shadow-xl rounded p-6 m-2 md:mx-10 md:my-6">
                        <div class="flex flex-col items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded-full p-3 bg-gray-300"><i class="fas fa-user-plus fa-fw fa-inverse text-indigo-500"></i></div>
                            </div>
                            <div class="flex-1">
                                <h3 class="font-bold text-3xl"> {{ $body['score']['ability_to_act'] }}/20<span class="text-yellow-600"><i class="fas fa-caret-up"></i></span></h3>
                                <h5 class="font-bold text-gray-500">Ability to act</h5>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-1/2 lg:w-full">
                    <div class="border-2 border-gray-400 border-dashed hover:border-transparent hover:bg-white hover:shadow-xl rounded p-6 m-2 md:mx-10 md:my-6">
                        <div class="flex flex-col items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded-full p-3 bg-gray-300"><i class="fas fa-server fa-fw fa-inverse text-indigo-500"></i></div>
                            </div>
                            <div class="flex-1">
                                <h3 class="font-bold text-3xl">{{ $body['score']['physical_condition'] }}/20</h3>
                                <h5 class="font-bold text-gray-500">Physical condition</h5>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!--Graph Content -->
            <div id="main-content" class="w-full flex-1">

                <div class="flex flex-1 flex-wrap">

                    <div class="w-full  p-6 xl:max-w-6xl">

                        <!--"Container" for the graphs"-->
                        <div class="max-w-full lg:max-w-3xl xl:max-w-5xl">

                            <!--Graph Card-->
                            <div class="border-b p-3">
                                <h5 class="font-bold text-black">Your wight & Setting target</h5>
                            </div>
                            <div class="p-5">
                                <div class="ct-chart ct-golden-section" id="chart1"></div>
                            </div>
                            <!--/Graph Card-->

                            <div class="border-b p-3">
                                <h5 class="font-bold text-black">Review</h5>
                            </div>
                            <div class="p-5">
                                <table class="w-full p-5 text-gray-700">
                                    <thead>
                                        <tr>
                                            <th class="text-center text-3xl text-blue-900">{{ $body['comment'] }}</th>
                                        </tr>
                                    </thead>
                                </table>

                            </div>

                        </div>

                    </div>

                    <div class="w-full xl:w-1/2 p-6 xl:max-w-4xl border-l-1 border-gray-300">

                        <!--"Container" for the graphs"-->
                        <div class="max-w-sm lg:max-w-3xl xl:max-w-5xl">

                            <!--Graph Card-->

                            <div class="border-b p-3">
                                <h5 class="font-bold text-black">Fats</h5>
                            </div>
                            <div class="p-5">
                                <div class="ct-chart ct-golden-section" id="chart2"></div>
                            </div>

                            <!-- Graph card2 -->
                            <div class="border-b p-3">
                                <h5 class="font-bold text-black">Muscles</h5>
                            </div>
                            <div class="p-5">
                                <div class="ct-chart ct-golden-section" id="chart3"></div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <script src="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
        <script>
            /* Refer to https://gionkunz.github.io/chartist-js/examples.html for setting up the graphs */


            var mainChart = new Chartist.Line('#chart1', {
                labels: @json($body['weights']['date']),
                series: [
                    [0],
                    @json($body['weights']['data']),
                    @json($body['target']['data'])
                ]
            }, {
                low: 40,
                showArea: true,
                showPoint: false,
                fullWidth: true,
            });

            mainChart.on('draw', function(data) {
                if (data.type === 'line' || data.type === 'area') {
                    data.element.animate({
                        d: {
                            begin: 1000 * data.index,
                            dur: 1000,
                            from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height()).stringify(),
                            to: data.path.clone().stringify(),
                            easing: Chartist.Svg.Easing.easeOutQuint
                        }
                    });
                }
            });

            var chartScatter = new Chartist.Line('#chart2', {
                labels: @json($body['fats']['date']),
                series: [
                    @json($body['fats']['data']),
                ]
            }, {
                low: 10
            });

            var chartScatter = new Chartist.Line('#chart3', {
                labels: @json($body['muscles']['date']),
                series: [
                    @json($body['muscles']['data']),
                ]
            }, {
                low: 10
            });

            chartScatter.on('draw', function(data) {
                if (data.type === 'line' || data.type === 'area') {
                    data.element.animate({
                        d: {
                            begin: 500 * data.index,
                            dur: 1000,
                            from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height()).stringify(),
                            to: data.path.clone().stringify(),
                            easing: Chartist.Svg.Easing.easeOutQuint
                        }
                    });
                }
            });
        </script>

    </body>

    </html>

</x-app-layout>