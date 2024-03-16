<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="w-full h-[100dvh] flex flex-col items-center justify-center">
    <form class="w-full" action="/createUser" method="post">
        <div class="lg:w-[50%] h-fit">
            <h1 class="uppercase text-2xl">Register</h1>
            <input type="text" placeholder="Enter preffered username" name="username" class="p-2 bg-gray-100"><br/><br/>
            <label for='role'>
                Role:
            </label>
            <select id="role" name="role">
                <option>User</option>
                <option>Admin</option>
            </select><br/><br/>
            <input type="password" placeholder="Enter preffered password" name="password" class="p-2 bg-gray-100">
    
            <button class="w-fit px-3 py-2 text-white rounded-lg bg-red-500">Register</button>
    
        </div>
    </form>
</body>
</html>
    