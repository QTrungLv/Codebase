<html>

<body>
    <h1>Hello, {{ $name }}</h1>
    <form method="POST" action="/profile">
        @csrf

        <!-- Equivalent to... -->
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>
</body>

</html