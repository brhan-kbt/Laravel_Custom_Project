@extends('layouts.app')
@section('content')

<main class="py-4 main-div">
    <div class="container justify-content-center align-items-center ">
            <div class="row">
                <div class="col-12 mt-5">
                    <div class="text-center text-success">
                    <h2 >እንኳን ወደ ምስካየ ህዙናን መዳናሌም ገዳም ድረ ገጽ በደህና መጡ</h2>
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col-12 mt-5">
                    <div class="text-center text-success">
                    <h3 class="text-dark" id="slogan">I was glad when they said unto me, Let us go into the house of the LORD. <p><span style="color: red; font-style:italic; font-weight:bold" id="sloganspan">~Psalm 122:1~</span></p> </h3>
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col-12 mt-5">
                    <div class=" flex-column text-center align-middle ">
                        <a href="{{action('UserAccountController@login')}}"  class="btn btn-outline-dark btn-lg pr-6">Login</a>
                        <a  href="/register" class="btn btn-outline-dark btn-lg">Register</a>

                </div>
            </div>

        

    </div>
    {{-- @include('layouts.modal.register')
    @include('layouts.modal.login') --}}
</main>
 

      

@endsection
 
        