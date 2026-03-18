<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Amazon UNAB</title>
    
    <!-- Google Fonts: Inter & Roboto -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- SweetAlert2 for real-time notifications -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Tailwind CSS CDN Fallback -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        roboto: ['Roboto', 'sans-serif'],
                        inter: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        'amazon-orange': '#febd69',
                        'amazon-dark': '#131921',
                        'amazon-navy': '#232f3e',
                        'amazon-blue': '#007185',
                        'amazon-button': '#ffd814',
                    }
                }
            }
        }
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #EAEDED;
        }
        .amazon-orange { color: #febd69; }
        .bg-amazon-dark { background-color: #131921; }
        .bg-amazon-navy { background-color: #232f3e; }
        .text-amazon-blue { color: #007185; }
        .bg-amazon-button { background-color: #ffd814; border-color: #fcd200; }
        .bg-amazon-button:hover { background-color: #f7ca00; }
        .bg-prime { background-color: #00A8E1; }
        
        /* Custom scrollbar for better tech look */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; }
        ::-webkit-scrollbar-thumb { background: #131921; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #febd69; }
    </style>
</head>
<body class="flex flex-col min-h-screen">
    @include ('layout.navbar')
    
    <main class="flex-grow">
        @yield('content') 
    </main>

    @include ('layout.footer')

    <!-- Flash Sale / Promo Polling Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @auth
            // Only poll if the user is authenticated (since the promo targets cart_promo_{user_id})
            setInterval(() => {
                fetch('/api/check-promo', {
                    headers: { 'Accept': 'application/json' }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.hasPromo) {
                        Swal.fire({
                            title: '<span style="color:#d97706; font-weight:900;">🔥 OFERTA EXCLUSIVA 🔥</span>',
                            html: `<p style="font-size: 1.1rem; color: #1e293b; margin-top: 10px;">${data.message}</p>
                                   <p style="font-size: 0.9rem; color: #64748b; margin-top: 15px;">Aplica automáticamente a los artículos de tu carrito.</p>`,
                            icon: 'warning',
                            iconColor: '#f59e0b',
                            background: '#fff',
                            confirmButtonText: '<i class="fas fa-shopping-cart"></i> Ir al Carrito',
                            confirmButtonColor: '#232f3e',
                            showCancelButton: true,
                            cancelButtonText: 'Seguir mirando',
                            cancelButtonColor: '#94a3b8',
                            customClass: {
                                popup: 'rounded-2xl border-2 border-amber-400 shadow-2xl',
                                confirmButton: 'rounded-full px-6 py-2 font-bold',
                                cancelButton: 'rounded-full px-6 py-2 font-bold'
                            }
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "{{ route('cart.index') }}";
                            }
                        });
                    }
                })
                .catch(error => console.error('Error checking promos:', error));
            }, 10000); // 10000 ms = 10s
            @endauth
        });
    </script>
</body>
</html>