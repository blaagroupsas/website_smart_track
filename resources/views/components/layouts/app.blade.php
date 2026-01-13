<!DOCTYPE html>
<html class="scroll-smooth" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ $title ?? 'SMART-TRACK | Digitaliza tu Empresa de Transporte' }}</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Outfit:wght@500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    
    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-background-light dark:bg-background-dark text-slate-900 dark:text-slate-100 font-sans selection:bg-primary/30">
    {{ $slot }}
    
    <x-modal-demo />
    
    <script>
        // Dark mode implementation
        (function() {
            const html = document.documentElement;
            const storageKey = 'theme';
            
            // Initialize theme from localStorage
            const currentTheme = localStorage.getItem(storageKey);
            if (currentTheme === 'dark') {
                html.classList.add('dark');
            } else {
                html.classList.remove('dark');
            }
            
            // Toggle function
            window.toggleTheme = function() {
                if (html.classList.contains('dark')) {
                    html.classList.remove('dark');
                    localStorage.setItem(storageKey, 'light');
                } else {
                    html.classList.add('dark');
                    localStorage.setItem(storageKey, 'dark');
                }
                updateIcons();
            };
            
            // Update icon visibility
            function updateIcons() {
                const isDark = html.classList.contains('dark');
                const lightIcon = document.getElementById('theme-toggle-light-icon');
                const darkIcon = document.getElementById('theme-toggle-dark-icon');
                
                if (lightIcon && darkIcon) {
                    if (isDark) {
                        lightIcon.classList.add('hidden');
                        darkIcon.classList.remove('hidden');
                    } else {
                        lightIcon.classList.remove('hidden');
                        darkIcon.classList.add('hidden');
                    }
                }
            }
            
            // Initialize icons when DOM is ready
            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', updateIcons);
            } else {
                updateIcons();
            }
        })();
        
        // Modal Demo Functions
        window.openModalDemo = function() {
            const modal = document.getElementById('modal-demo');
            if (modal) {
                modal.classList.remove('hidden');
                modal.classList.add('flex');
                document.body.style.overflow = 'hidden';
            }
        };
        
        window.closeModalDemo = function() {
            const modal = document.getElementById('modal-demo');
            if (modal) {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
                document.body.style.overflow = '';
                
                // Resetear el modal al estado inicial
                setTimeout(() => {
                    document.getElementById('form-content').classList.remove('hidden');
                    document.getElementById('success-message').classList.add('hidden');
                    const form = document.querySelector('#modal-demo form');
                    if (form) form.reset();
                }, 300);
            }
        };
        
        window.handleDemoSubmit = function(event) {
            event.preventDefault();
            const formData = new FormData(event.target);
            const data = Object.fromEntries(formData);
            
            // Deshabilitar botón de envío
            const submitButton = event.target.querySelector('button[type="submit"]');
            const originalText = submitButton.innerHTML;
            submitButton.disabled = true;
            submitButton.innerHTML = '<span class="material-icons-round animate-spin">sync</span> Enviando...';
            
            // Enviar datos al servidor
            fetch('/leads', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json',
                },
                body: JSON.stringify(data)
            })
            .then(response => {
                if (!response.ok) {
                    return response.json().then(err => {
                        throw new Error(err.message || 'Error en el servidor');
                    });
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    // Mostrar mensaje de éxito
                    document.getElementById('form-content').classList.add('hidden');
                    document.getElementById('success-message').classList.remove('hidden');
                    event.target.reset();
                    
                    // Auto-cerrar después de 5 segundos
                    setTimeout(() => {
                        closeModalDemo();
                    }, 5000);
                } else {
                    alert(data.message || 'Hubo un error al enviar la solicitud. Por favor, intenta nuevamente.');
                }
            })
            .catch(error => {
                console.error('Error completo:', error);
                alert('Error: ' + error.message);
            })
            .finally(() => {
                submitButton.disabled = false;
                submitButton.innerHTML = originalText;
            });
        };
        
        // Close modal on ESC key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeModalDemo();
            }
        });
        
        // Close modal on backdrop click
        document.addEventListener('click', function(e) {
            const modal = document.getElementById('modal-demo');
            if (e.target === modal) {
                closeModalDemo();
            }
        });
    </script>
</body>
</html>
