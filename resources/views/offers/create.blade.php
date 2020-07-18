<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
      
    </head>
        @include('include.navbar')
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    {{__('messages.add your offer')}}
                    
                    
                </div>
                @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif
        <form method="POST" action="{{route('offer.store')}}">
            @csrf
            <div class="form-group">
                    <label for="exampleInputEmail1">{{__('messages.Offer Name ar')}}</label>
                 <input type="text" class="form-control" name="name_ar" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{__('messages.Offer Name ar')}}">
                 @error('name_ar')
                 <small class="form-text text-danger">{{$message ?? ''}}</small>
                 @enderror
             </div>
             <div class="form-group">
                    <label for="exampleInputEmail1">{{__('messages.Offer Name en')}}</label>
                 <input type="text" class="form-control" name="name_en" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{__('messages.Offer Name en')}}">
                 @error('name_en')
                 <small class="form-text text-danger">{{$message ?? ''}}</small>
                 @enderror
             </div>
            <div class="form-group">
                 <label for="exampleInputPassword1">{{__('messages.Offer Price')}}</label>
                 <input type="text" class="form-control" name="price" id="exampleInputPassword1" placeholder="{{__('messages.Offer Price')}}">
                 @error('price')
                 <small class="form-text text-danger">{{$message ?? ''}}</small>
                 @enderror
            </div>
            <div class="form-group">
                 <label for="exampleInputPassword1">{{__('messages.Offer Details ar')}}</label>
                 <input type="text" class="form-control" name="details_ar" id="exampleInputPassword1" placeholder="{{__('messages.Offer Details ar')}}">
                 @error('details_ar')
                 <small class="form-text text-danger">{{$message ?? ''}}</small>
                 @enderror
            </div>
            <div class="form-group">
                 <label for="exampleInputPassword1">{{__('messages.Offer Details en')}}</label>
                 <input type="text" class="form-control" name="details_en" id="exampleInputPassword1" placeholder="{{__('messages.Offer Details en')}}">
                 @error('details_en')
                 <small class="form-text text-danger">{{$message ?? ''}}</small>
                 @enderror
            </div>            
            <button type="submit" class="btn btn-primary">{{__('messages.Submit')}}</button>
        </form>
            </div>
        </div>
    </body>
</html>
