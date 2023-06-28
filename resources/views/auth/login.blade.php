<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ServTool</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>
<body>
<div class="w-full h-[100vh] flex">
    <div class="hidden lg:flex w-3/4 h-full bg-[#6D7371] relative overflow-hidden">
        <img class="w-full h-[100vh] object-cover" src="/login.jpg">
    </div>
    <div class="w-full lg:w-1/4 h-full flex flex-col items-center justify-center px-12">
        <img class="mb-16" src="{{ asset('servtool_icon.jpg') }}">
        <p class="text-2xl font-bold text-center">Welcome</p>
        <form method="POST" action="{{ route('login') }}" class="w-full mt-12">
            {{ csrf_field() }}

            <div class="form-group w-full">
                <label class="font-semibold text-sm" for="email">Enter your email address</label><br>
                <input type="email" name="email" id="email"
                       class="mt-1 rounded-md w-full border border-gray-300 text-sm h-12 px-4">
            </div>

            <div class="password w-full mt-3">
                <label class="font-semibold text-sm" for="password">Enter your email password</label><br>
                <input type="password" name="password" id="password"
                       class="mt-1 rounded-md w-full border border-gray-300 text-sm h-12 px-4">
            </div>

            <div class="container">
                @if(!empty($errors) && !empty($errors->get('login_error')))
                    @foreach($errors->get('login_error') as $error)
                        {{$error}}
                    @endforeach
                @endif
                <button type="submit"
                        class="border border-[#318DFF] hover:text-white hover:bg-[#318DFF] text-[#318DFF] font-semibold text-md mt-6 w-full py-3 rounded-full">
                    Log in
                </button>
{{--                <a class="text-center text-sm underline mt-4 block" href="{{config("app.client_url")}}/forgot-password">Forgot Password?</a>--}}
            </div>

        </form>
    </div>
</div>
</body>
