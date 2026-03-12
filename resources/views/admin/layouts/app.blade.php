<!DOCTYPE html>
<html>
<head>
<title>Admin</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

@include('layout.navbar')

<div class="max-w-7xl mx-auto p-6">
    @yield('content')
</div>

</body>
</html>