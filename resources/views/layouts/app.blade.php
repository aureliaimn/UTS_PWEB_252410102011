<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | Teras Kopi</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,400;12..96,600;12..96,800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        tinta: '#000000',
                        kertas: '#FBF0D4',
                        garis: '#8A5A00',
                        pinus: '#6d472e',
                        pinusmuda: '#be8f6f',
                        kunyit: '#8A5A00',
                        kunyitmuda: '#FBF0D4',
                    },
                    fontFamily: {
                        sans: ['"Bricolage Grotesque"', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                    },
                },
            },
        }
    </script>
</head>
<body class="flex min-h-screen flex-col bg-kertas font-sans text-tinta antialiased">

    @sectionMissing('tanpa-navbar')
        <x-navbar :username="$username ?? null" />
    @endif

    <main class="mx-auto w-full max-w-5xl flex-1 px-5 py-10">
        @yield('content')
    </main>

    @include('components.footer')

</body>
</html>
