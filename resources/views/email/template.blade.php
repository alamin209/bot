<!DOCTYPE html>
<html>
    <head>
        <title> Email Template in Laravel </title>
    </head>
    <body>
        <div class="py-12">

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden sm:rounded-lg">

                    <div class="min-h-screen flex justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
                        <div class="max-w-md w-full space-y-8">
                            Test Deatils :Name {{$data['name']}} {{$data['last_name']}} Email : {{$data['email']}}
                            phone: {{$data['phone']}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>