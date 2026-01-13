<!-- Modal Overlay -->
<div id="modal-demo" class="fixed inset-0 z-50 hidden items-center justify-center p-4 sm:p-6 modal-blur">
    <!-- Modal Container -->
    <div class="relative w-full max-w-4xl bg-white dark:bg-gray-900 rounded-xl shadow-2xl overflow-hidden flex flex-col md:flex-row min-h-[580px] animate-modal-appear">
        
        <!-- Left Branding Panel (40%) -->
        <div class="w-full md:w-[40%] bg-primary p-8 md:p-12 flex flex-col justify-between text-white relative">
            <!-- Abstract Design Elements -->
            <div class="absolute top-0 left-0 w-full h-full opacity-10 pointer-events-none">
                <svg width="100%" height="100%" viewBox="0 0 100 100" preserveAspectRatio="none">
                    <path d="M0 0 L100 0 L100 100 Z" fill="white"/>
                </svg>
            </div>

            <div class="relative z-10">
                <div class="flex items-center gap-2 mb-8">
                    <span class="material-icons-round text-cyan-400">local_shipping</span>
                    <span class="font-bold tracking-widest text-xs uppercase opacity-80">Smart-Track Colombia</span>
                </div>
                
                <h2 class="text-3xl md:text-4xl font-bold leading-tight mb-4">Impulsa tu flota</h2>
                <p class="text-blue-100 text-sm md:text-base leading-relaxed mb-8">
                    Optimiza la gestión de tu transporte con tecnología líder diseñada para las rutas colombianas. 
                    Ahorra combustible, mejora la seguridad y escala tu operación.
                </p>

                <div class="flex flex-col gap-4 mt-8">
                    <div class="flex items-center gap-3">
                        <div class="size-8 rounded-full bg-white/10 flex items-center justify-center">
                            <span class="material-icons-round text-sm">chat</span>
                        </div>
                        <div class="flex flex-col">
                            <span class="text-[10px] uppercase opacity-60 font-bold tracking-wider">WhatsApp Soporte</span>
                            <span class="text-sm font-medium">+57 (300) 123-4567</span>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="size-8 rounded-full bg-white/10 flex items-center justify-center">
                            <span class="material-icons-round text-sm">mail</span>
                        </div>
                        <div class="flex flex-col">
                            <span class="text-[10px] uppercase opacity-60 font-bold tracking-wider">Ventas Corporativas</span>
                            <span class="text-sm font-medium">comercial@smart-track.co</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Linear Bus Illustration -->
            <div class="relative z-10 mt-12 opacity-40">
                <svg class="w-full h-auto text-white fill-none stroke-current stroke-1" viewBox="0 0 200 80">
                    <path d="M20,60 L180,60 L185,55 L185,30 L170,20 L30,20 L20,30 L20,60 Z"/>
                    <path d="M30,25 L80,25 L80,45 L25,45 L25,30 L30,25 Z"/>
                    <path d="M90,25 L140,25 L140,45 L90,45 L90,25 Z"/>
                    <path d="M150,25 L165,25 L175,35 L175,45 L150,45 L150,25 Z"/>
                    <circle cx="50" cy="65" r="8"/>
                    <circle cx="150" cy="65" r="8"/>
                </svg>
            </div>
        </div>

        <!-- Right Form Panel (60%) -->
        <div class="w-full md:w-[60%] bg-white dark:bg-gray-900 p-8 md:p-12 flex flex-col relative">
            <!-- Close Button -->
            <button onclick="closeModalDemo()" class="absolute top-4 right-4 md:top-6 md:right-6 text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 transition-colors z-10">
                <span class="material-icons-round">close</span>
            </button>

            <!-- Success Message (Hidden by default) -->
            <div id="success-message" class="hidden absolute inset-0 bg-white dark:bg-gray-900 flex flex-col items-center justify-center p-8 z-20">
                <div class="text-center max-w-md">
                    <div class="mb-6">
                        <div class="mx-auto w-16 h-16 bg-green-100 dark:bg-green-900/30 rounded-full flex items-center justify-center">
                            <span class="material-icons-round text-green-600 dark:text-green-400 text-4xl">check_circle</span>
                        </div>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-3">¡Solicitud Enviada!</h3>
                    <p class="text-gray-600 dark:text-gray-400 mb-6">
                        Hemos recibido tu solicitud exitosamente. Un especialista de nuestro equipo te contactará en las próximas 24 horas.
                    </p>
                    <button onclick="closeModalDemo()" class="bg-primary hover:bg-secondary text-white font-semibold px-6 py-3 rounded-lg transition-all">
                        Entendido
                    </button>
                </div>
            </div>

            <!-- Form Content -->
            <div id="form-content">
                <div class="mb-8">
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white">Solicita tu Cotización</h3>
                    <p class="text-gray-500 dark:text-gray-400 text-sm mt-1">Completa el formulario y recibe una propuesta personalizada en menos de 24 horas.</p>
                </div>

            <form class="flex flex-col gap-5 flex-1" onsubmit="handleDemoSubmit(event)">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="flex flex-col gap-1.5">
                        <label class="text-xs font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wide">Nombre Completo*</label>
                        <input 
                            class="w-full px-4 py-2.5 bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg text-sm focus:ring-2 focus:ring-primary focus:border-primary transition-all dark:text-white" 
                            placeholder="Ej. Juan Pérez" 
                            type="text"
                            name="nombre"
                            required
                        />
                    </div>
                    <div class="flex flex-col gap-1.5">
                        <label class="text-xs font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wide">Empresa*</label>
                        <input 
                            class="w-full px-4 py-2.5 bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg text-sm focus:ring-2 focus:ring-primary focus:border-primary transition-all dark:text-white" 
                            placeholder="Nombre de tu organización" 
                            type="text"
                            name="empresa"
                            required
                        />
                    </div>
                </div>

                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wide">Correo Corporativo*</label>
                    <input 
                        class="w-full px-4 py-2.5 bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg text-sm focus:ring-2 focus:ring-primary focus:border-primary transition-all dark:text-white" 
                        placeholder="email@empresa.com" 
                        type="email"
                        name="email"
                        required
                    />
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="flex flex-col gap-1.5">
                        <label class="text-xs font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wide">Teléfono (WhatsApp)*</label>
                        <input 
                            class="w-full px-4 py-2.5 bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg text-sm focus:ring-2 focus:ring-primary focus:border-primary transition-all dark:text-white" 
                            placeholder="+57 300 000 0000" 
                            type="tel"
                            name="telefono"
                            required
                        />
                    </div>
                    <div class="flex flex-col gap-1.5">
                        <label class="text-xs font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wide">Tamaño de Flota</label>
                        <select 
                            class="w-full px-4 py-2.5 bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg text-sm focus:ring-2 focus:ring-primary focus:border-primary transition-all appearance-none dark:text-white"
                            name="tamaño_flota"
                        >
                            <option value="" selected>Selecciona una opción</option>
                            <option value="1-10">1-10 vehículos</option>
                            <option value="11-50">11-50 vehículos</option>
                            <option value="50+">+50 vehículos</option>
                        </select>
                    </div>
                </div>

                <div class="mt-4">
                    <button 
                        class="w-full py-3.5 px-6 bg-cyan-500 hover:bg-cyan-600 text-white font-bold rounded-lg transition-all shadow-lg shadow-cyan-500/40 hover:shadow-cyan-500/60 flex items-center justify-center gap-2 group" 
                        type="submit"
                    >
                        Enviar Solicitud
                        <span class="material-icons-round text-lg group-hover:translate-x-1 transition-transform">arrow_forward</span>
                    </button>
                </div>

                <p class="text-[10px] text-gray-400 text-center mt-4 leading-relaxed uppercase tracking-tighter">
                    Al hacer clic, aceptas nuestra política de tratamiento de datos (Habeas Data). <br/>
                    Tus datos están seguros y protegidos bajo la ley 1581 de 2012.
                </p>
            </form>
            </div>
        </div>
    </div>
</div>
