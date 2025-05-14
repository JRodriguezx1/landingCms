<div class="inicio">
    <h4 class="text-slate-500 text-2xl mb-4"><i class="fa-solid fa-building-circle-check mr-4"></i><?php echo $titulo; ?> </h4>
    
    <div class="bloques">
        <div class="bloques__grid">
            <div class="bloques__bloque">
                <p class="bloques__heading">Visitas Hoy</p>
                <div class="bloques__contenido">
                    <p class="sign"><span>$</span><?php echo $day->computarizado??'0'; ?></p>
                    <i class="idollar fa-solid fa-dollar-sign"></i>
                </div>
            </div>

            <div class="bloques__bloque">
                <p class="bloques__heading">Total Visitas</p>
                <div class="bloques__contenido">
                    <p class="plus"><i class="fa-solid fa-plus"></i><?php echo $day->totalservices??'0';?></p>
                    <i class="icalender fa-regular fa-calendar-check"></i>
                </div>
            </div>

            <div class="bloques__bloque">
                <p class="bloques__heading">Clientes</p>
                <div class="bloques__contenido">
                    <p class="angule"><i class="fa-solid fa-angle-up"></i><?php echo $totalclientes; ?></p>
                    <i class="iusers fa-solid fa-users"></i>
                </div>
            </div>

            <div class="bloques__bloque">
                <p class="bloques__heading">Usuarios</p>
                <div class="bloques__contenido">
                    <p class="employee"><i class="fa-solid fa-plus"></i><?php echo $totalempleados; ?></p>
                    <i class="icard fa-solid fa-address-card"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="datos">
        
        <div class="datos__contenedorgraficas">
            <div class="datos__grafica1">
                <p class="text-center text-gray-500 text-xl mt-0 mb-2">Representacion grafica de visitas</p>
                <canvas class="max-h-96" id="chartventas"></canvas>
            </div>

            <div class="datos__completado">
                <div class="datos__admin">
                    <div class="datos__bg">
                        <p class="my-0 text-blue-600 font-medium">Bienvenido !</p>
                        <div class="datos__user">
                            <i class="fa-solid fa-user-large"></i>
                        </div>
                    </div>
                    <div class="datos__admininfo">
                        <div class="datos__perfil">
                            <p class="m-0 text-gray-500 text-xl"><?php echo $user['nombre'] ?></p>
                            <p class="m-0 text-gray-600 font-medium"><?php echo $user['perfil']!=="Administrador"?'Empleado':'Admin'; ?></p>
                        </div>
                        <div class="datos__btn">
                            <a class="btn-xs btn-blue" href="/admin/perfil">Perfil <i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="datos__infocompletado">
                    <div class="datos__texto">
                        <p class="text-gray-600 ">Daily Earning</p>
                        <p class="text-gray-600">This Day</p>
                        <!--<h3 class="dailyearning"></h3>-->
                        <a class="btn-xs btn-blue" href="/admin/facturacion">Ver Mas <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                    <div class="rueda">
                        <div class="afuera">
                            <div class="adentro">
                                <p class="numero">0%</p>
                            </div>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="160px" height="160px">
                            <defs>
                                <linearGradient id="GradientColor1">
                                    <stop offset="0%" stop-color="#e91e63" />
                                    <stop offset="100%" stop-color="#673ab7" />
                                </linearGradient>
                            </defs>
                            <circle cx="80" cy="80" r="70" stroke-linecap="round" />
                        </svg>    
                    </div> <!-- fin rueda -->
                </div> <!-- fin infocompletado -->
                <p class="ml-4 text-gray-500 text-xl">Registro digital en timepo real.</p>
            </div>
        </div> <!-- fin datos__contenedorgraficas -->
    </div> <!-- fin datos -->

    <style>
        /* Ajustar la altura de las celdas */
        /*.fc-daygrid-day {
        height: 100px; /* Cambia la altura de las celdas */
        /*}*/
        .fc .fc-toolbar.fc-header-toolbar {
            margin-bottom: .7rem;
        }
    </style>
    
</div>