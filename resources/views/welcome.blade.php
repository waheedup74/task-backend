<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel Task</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        <div class="container">
          <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4">
            <div class="col">
              <div class="card bg-primary|secondary|success|danger|warning|info|light|dark text-primary|secondary|success|danger|warning|info|light|dark">
              <div class="card-header">
                Count of all active and verified users
              </div>
              <div class="card-body text-center">
                <blockquote class="blockquote mb-0">
                  <p>{{$activeVerified}}</p>
                </blockquote>
              </div>
            </div>
         </div>
            <div class="col">
                <div class="card bg-primary|secondary|success|danger|warning|info|light|dark text-primary|secondary|success|danger|warning|info|light|dark">
              <div class="card-header">
                Count of active and verified users who have attached active products
              </div>
              <div class="card-body text-center">
                <blockquote class="blockquote mb-0">
                  <p>{{$attachActiveVerified}}</p>
                </blockquote>
              </div>
            </div>
            </div>
            <div class="col">
              <div class="card bg-primary|secondary|success|danger|warning|info|light|dark text-primary|secondary|success|danger|warning|info|light|dark">
              <div class="card-header">
                Count of all active products
              </div>
              <div class="card-body text-center">
                <blockquote class="blockquote mb-0">
                  <p>{{$activeProduct}}</p>
                </blockquote>
              </div>
            </div>
            </div>
            <div class="col">
             <div class="card bg-primary|secondary|success|danger|warning|info|light|dark text-primary|secondary|success|danger|warning|info|light|dark">
              <div class="card-header">
                Count of active products which don't belong to any user
              </div>
              <div class="card-body">
                <blockquote class="blockquote mb-0">
                  <p>{{$notbelonguser}}</p>
                </blockquote>
              </div>
            </div>
            </div>
            <div class="col mt-3">
             <div class="card bg-primary|secondary|success|danger|warning|info|light|dark text-primary|secondary|success|danger|warning|info|light|dark">
              <div class="card-header">
                Amount of all active attached products
              </div>
              <div class="card-body text-center">
                <blockquote class="blockquote mb-0">
                  <p>${{$amountactiveattachedproducts}}</p>
                </blockquote>
              </div>
            </div>
            </div>
            <div class="col mt-3">
             <div class="card bg-primary|secondary|success|danger|warning|info|light|dark text-primary|secondary|success|danger|warning|info|light|dark">
              <div class="card-header">
                Summarized price of all active attached products
              </div>
              <div class="card-body text-center">
                <blockquote class="blockquote mb-0">
                  <p>${{$summarizedprice}}</p>
                </blockquote>
              </div>
            </div>
            </div>
            <div class="col mt-3">
             <div class="card bg-primary|secondary|success|danger|warning|info|light|dark text-primary|secondary|success|danger|warning|info|light|dark">
              <div class="card-header">
                Summarized prices of all active products per user
              </div>
              <div class="card-body">
                <blockquote class="blockquote mb-0">
                    @foreach($summarizedpriceuser as $key=>$user)
                     <span>{{$user->name}}</span>
                       <?php $amount = 0  ?>
                           @foreach($user->attactuser as $attach)
                             <?php $amount += $attach->product->amount * $attach->quantity; ?>
                           @endforeach
                       ${{$amount}}
                  @endforeach
                </blockquote>
              </div>
            </div>
            </div>
          </div>
        </div>
        </div>
    </body>
</html>
