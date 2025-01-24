<!--
<div class="lineaencabezado" style="background-color: <?php //echo $negocio[0]->colorprincipal??'';?>;">
    <h1><?php //echo $negocio[0]->nombre??'';?></h1>
</div>

<section class="slider">
    <ul class="slider__contenido">
        <li class="slider__slide1 slider__slide"></li>
        <li class="slider__slide2 slider__slide"></li>
    </ul>
</section>

<main class="auth bloqueauth">
    <-- <a class="auth__btnatras bloqueauth__btnregresar" href="/">Regresar</a> --><!-- 
    <a class="bloqueauth__logocliente" href="/">
        <img loading="lazy" src="/build/img/<?php //echo $negocio[0]->logo??'';?>" alt="Logo Cliente">
    </a>
    
    <h2 class="auth__heading bloqueauth__iniciarsesion" style="color: <?php //echo $negocio[0]->colorprincipal??'';?>;"><?php echo $titulo; ?></h2>
    <?php //include __DIR__. "/../templates/alertas.php"; ?>
    <p class="auth__texto bloqueauth__subtitulo">Inicia sesión y reserva tu cita</p>
    <form class="formulario bloqueformulario" method="POST" action="/login">
        <div class="formulario__campo bloqueformulario__campo">
            <!-<label class="formulario__label bloqueformulario__label" for="">Correo Electrónico</label>
            <input class="formulario__input bloqueformulario__input" type="email" placeholder="Ingresa tu correo electrónico" id="email" name="email">
            --><!-- 
            <label class="formulario__label" for="movil">Número de Teléfono</label>
            <input class="formulario__input" type="number" placeholder="Ingresa tu número de telefónico" id="movil" name="movil">
        </div>
        <div class="formulario__campo ">
            <label class="formulario__label" for="">Contraseña</label>
            <input class="formulario__input" type="password" placeholder="Ingresa tu contraseña" id="password" name="password">
        </div>
        <input class="formulario__submit--login bloqueformulario__submit--login" type="submit" value="Iniciar Sesión" style="background-color: <?php echo $negocio[0]->colorprincipal??'';?>;">
    </form>

    <div class="acciones">
        <a href="/registro" class="acciones__enlace">¿Aún no tienes cuenta? <br> Obtener una</a>
        <--<a href="/olvide" class="acciones__enlace">Olvidaste tu password</a>-->
        <!-- <a href="/" class="acciones__enlace">Home</a>
    </div>
</main>-->

<!--
  <div class="h-screen w-screen flex justify-center items-center dark:bg-gray-900">
    <div class="grid gap-8">
      <div id="back-div" class="bg-gradient-to-r from-blue-500 to-purple-500 rounded-[26px] m-4">
        <div class="border-[20px] border-transparent rounded-[20px] dark:bg-gray-900 bg-white shadow-lg xl:p-10 2xl:p-10 lg:p-10 md:p-10 sm:p-2 m-2">
          <h1 class="pt-8 pb-6 font-bold dark:text-gray-400 text-5xl text-center cursor-default">
            Iniciar Session
          </h1>
          <form action="/login" method="post" class="space-y-4">
            <div>
              <label for="email" class="mb-2  dark:text-gray-400 text-xl">Movil</label>
              <input
                id="email"
                class="border p-3 dark:bg-indigo-700 dark:text-gray-300  dark:border-gray-700 shadow-md placeholder:text-base focus:scale-105 ease-in-out duration-300 border-gray-300 rounded-lg w-full"
                type="number"
                placeholder="Tu movil"
                name="movil"
                required
              />
            </div>
            <div>
              <label for="password" class="mb-2 dark:text-gray-400 text-xl">Password</label>
              <input
                id="password"
                class="border p-3 shadow-md dark:bg-indigo-700 dark:text-gray-300  dark:border-gray-700 placeholder:text-base focus:scale-105 ease-in-out duration-300 border-gray-300 rounded-lg w-full"
                type="password"
                placeholder="Ingresa tu contraseña"
                name="password"
                required
              />
            </div>
            <a
              class="group text-blue-400 transition-all duration-100 ease-in-out"
              href="#"
            >
              <span
                class="bg-left-bottom bg-gradient-to-r text-lg from-blue-400 to-blue-400 bg-[length:0%_2px] bg-no-repeat group-hover:bg-[length:100%_2px] transition-all duration-500 ease-out"
              >
                Forget your password?
              </span>
            </a>
            <button
              class="bg-gradient-to-r dark:text-gray-300 from-blue-500 to-purple-500 shadow-lg mt-6 p-2 text-white rounded-lg w-full hover:scale-105 hover:from-purple-500 hover:to-blue-500 transition duration-300 ease-in-out"
              type="submit"
            >
              LOG IN
            </button>
          </form>
          <div class="flex flex-col mt-4 items-center justify-center text-lg">
            <h3 class="dark:text-gray-300">
              No tienes una cuenta?
              <a
                class="group text-blue-400 transition-all duration-100 ease-in-out"
                href="#"
              >
                <span
                  class="bg-left-bottom bg-gradient-to-r from-blue-400 to-blue-400 bg-[length:0%_2px] bg-no-repeat group-hover:bg-[length:100%_2px] transition-all duration-500 ease-out"
                >
                  Sign Up
                </span>
              </a>
            </h3>
          </div>-->
          <!-- Third Party Authentication Options -->
          
          <!--
          <div
            class="text-gray-500 flex text-center flex-col mt-4 items-center text-lg"
          >
            <p class="cursor-default">
              By signing in, you agree to our
              <a
                class="group text-blue-400 transition-all duration-100 ease-in-out"
                href="#"
              >
                <span
                  class="cursor-pointer bg-left-bottom bg-gradient-to-r from-blue-400 to-blue-400 bg-[length:0%_2px] bg-no-repeat group-hover:bg-[length:100%_2px] transition-all duration-500 ease-out"
                >
                  Terms
                </span>
              </a>
              and
              <a
                class="group text-blue-400 transition-all duration-100 ease-in-out"
                href="#"
              >
                <span
                  class="cursor-pointer bg-left-bottom bg-gradient-to-r from-blue-400 to-blue-400 bg-[length:0%_2px] bg-no-repeat group-hover:bg-[length:100%_2px] transition-all duration-500 ease-out"
                >
                  Privacy Policy
                </span>
              </a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>-->

  
<div class="min-h-screen flex items-center justify-center w-full dark:bg-gray-950">
	<div class="bg-white dark:bg-gray-900 shadow-md rounded-lg px-8 py-8 max-w-md">
		<h1 class="text-3xl font-bold text-center mb-4 text-gray-800 dark:text-gray-200">Iniciar Sesion</h1>
		<form action="/login" method="post">
			<div class="mb-4">
				<label for="email" class="block text-xl font-medium text-gray-700 dark:text-gray-300 mb-2">Movil</label>
				<input id="email" class="shadow-sm rounded-md w-full px-3 py-2 border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 placeholder:text-lg"
          type="number"
          placeholder="Tu movil"
          name="movil"
          required
        >
			</div>
			<div class="mb-4">
				<label for="password" class="block text-xl font-medium text-gray-700 dark:text-gray-300 mb-2">Password</label>
				<input id="password" class="shadow-sm rounded-md w-full px-3 py-2 border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 placeholder:text-lg" 
          type="password"
          placeholder="Ingresa tu contraseña"
          name="password"
          required
        >
				<a href="#"
					class="text-lg text-gray-600 hover:text-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Forgot
					Password?</a>
			</div>
			<div class="flex items-center justify-between mb-4">
				<div class="flex items-center">
					<input type="checkbox" id="remember" class="h-5 w-5 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 focus:outline-none" checked>
					<label for="remember" class="ml-2 block text-base text-gray-700 dark:text-gray-300">Remember me</label>
				</div>
				<a href="#"
					class="text-base text-indigo-500 hover:text-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Create
					Account</a>
			</div>
			<button onclick="alert("hello")" type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-xl font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Login</button>
		</form>
	</div>
</div>