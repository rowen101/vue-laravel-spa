@extends('layouts.app')
@section('content')

    <div class="flex bg-gray-100 border-b border-gray-300 py-4">
        <div class="container mx-auto flex justify-between">

            <div class="flex">

                <router-link class="mr-4" to='/' exact>Home</router-link>
                <router-link class="mr-4" to='/dashboard'>About</router-link>

                @auth
                    <router-link to='/monitoring'>Monitoring</router-link>
                @endauth
            </div>


            <div class="flax">

                <!-- Authentication Links -->
                @guest
                    <router-link class="mr-4" to='/login' exact>Login</router-link>
                    <router-link to='/register'>Register</router-link>

                @else
                    @auth
                        <router-link class="mr-4" to='/login' exact>Hi! <span>{{ Auth::user()->name }}</span>
                        </router-link>

                        <router-link to='/logout'>Logout</router-link>
                    @endauth
                @endguest
            </div>

        </div>
    </div>

    <div class="container mx-auto py-2">
        <router-view></router-view>
    </div>

@endsection
