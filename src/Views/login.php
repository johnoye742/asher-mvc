<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="w-full h-[100dvh] flex flex-col items-center justify-center">
    <form class="w-full" action="/login" method="post">
        <div class="lg:w-[50%] h-fit">
            <h1 class="uppercase text-2xl">Login</h1>
            <input type="text" placeholder="Enter your username" name="username" class="p-2 bg-gray-100"><br/><br/>
           
            <input type="password" placeholder="Enter your password" name="password" class="p-2 bg-gray-100">
    
            <button class="w-fit px-3 py-2 text-white rounded-lg bg-red-500">Login</button>
    
        </div>
    </form>
</body>
</html>
    