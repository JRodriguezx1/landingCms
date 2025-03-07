<!--<!DOCTYPE html>
<html lang="en">-->
  <!--<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Base - Tailwind CSS Startup Template</title>
    <link rel="icon" href="favicon.ico">
    <link href="style.css" rel="stylesheet">
  </head> -->

  <body
    x-data="{ page: 'home', 'darkMode': true, 'stickyMenu': false, 'navigationOpen': false, 'scrollTop': false }"
    x-init="
         darkMode = JSON.parse(localStorage.getItem('darkMode'));
         $watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))"
    :class="{'b eh': darkMode === true}"
  >
    <!-- ===== Header Start ===== -->
    <header
      class="g s r vd ya cj"
      :class="{ 'hh sm _k dj bl ll' : stickyMenu }"
      @scroll.window="stickyMenu = (window.pageYOffset > 20) ? true : false"
>
      <div class="bb ze ki xn 2xl:ud-px-0 oo wf yf i">
        <div class="vd to/4 tc wf ">
          <a class="w-16" href="index.html">
          <img class="om" src="/build/images/tramites.png" alt="Logo Light" style="width: 225px; height: auto;" />
            <img class="xc nm" src="/build/images/tramitesocsuro.png" alt="Logo Dark" style="width: 225px; height: auto;" />
          </a>

          <!-- Hamburger Toggle BTN -->
          <button class="po rc" @click="navigationOpen = !navigationOpen">
            <span class="rc i pf re pd">
              <span class="du-block h q vd yc">
                <span class="rc i r s eh um tg te rd eb ml jl dl" :class="{ 'ue el': !navigationOpen }"></span>
                <span class="rc i r s eh um tg te rd eb ml jl fl" :class="{ 'ue qr': !navigationOpen }"></span>
                <span class="rc i r s eh um tg te rd eb ml jl gl" :class="{ 'ue hl': !navigationOpen }"></span>
              </span>
              <span class="du-block h q vd yc lf">
                <span class="rc eh um tg ml jl el h na r ve yc" :class="{ 'sd dl': !navigationOpen }"></span>
                <span class="rc eh um tg ml jl qr h s pa vd rd" :class="{ 'sd rr': !navigationOpen }"></span>
              </span>
            </span>
          </button>
          <!-- Hamburger Toggle BTN -->
        </div>

        <div class="vd wo/4 sd qo f ho oo wf yf" :class="{ 'd hh rm sr td ud qg ug jc yh': navigationOpen }">
          <nav>
            <ul class="tc _o sf yo cg ep">
              <li><a href="index.html" class="xl" :class="{ 'mk': page === 'home' }">Inicio</a></li>
              <li><a href="index.html#features" class="xl">Servicios</a></li>
              <li class="c i" x-data="{ dropdown: false }">
                <a
                  href="#"
                  class="xl tc wf yf bg"
                  @click.prevent="dropdown = !dropdown"
                  :class="{ 'mk': page === 'blog-grid' || page === 'blog-single' || page === 'signin' || page === 'signup' || page === '404' }"
                >
                  Contacto

                  <!-- <svg
                    :class="{ 'wh': dropdown }"
                    class="th mm we fd pf" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z" />
                  </svg> -->
                </a>

                <!-- Dropdown Start -->
                <!-- <ul class="a" :class="{ 'tc': dropdown }">
                  <li><a href="blog-grid.html" class="xl" :class="{ 'mk': page === 'blog-grid' }">Blog Grid</a></li>
                  <li><a href="blog-single.html" class="xl" :class="{ 'mk': page === 'blog-single' }">Blog Single</a></li>
                  <li><a href="signin.html" class="xl" :class="{ 'mk': page === 'signin' }">Sign In</a></li>
                  <li><a href="signup.html" class="xl" :class="{ 'mk': page === 'signup' }">Sign Up</a></li>
                  <li><a href="404.html" class="xl" :class="{ 'mk': page === '404' }">404</a></li>
                </ul> -->
                <!-- Dropdown End -->
              </li>
              <!-- <li><a href="index.html#support" class="xl">Support</a></li> -->
            </ul>
          </nav>

          <div class="tc wf ig pb no">
            <div class="pc h io pa ra" :class="navigationOpen ? '!-ud-visible' : 'd'">
              <label class="rc ab i">
                <input type="checkbox" :value="darkMode" @change="darkMode = !darkMode" class="pf vd yc uk h r za ab" />
                <!-- Icon Sun -->
                <svg :class="{ 'wn' : page === 'home', 'xh' : page === 'home' && stickyMenu }" class="th om" width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M12.0908 18.6363C10.3549 18.6363 8.69 17.9467 7.46249 16.7192C6.23497 15.4916 5.54537 13.8268 5.54537 12.0908C5.54537 10.3549 6.23497 8.69 7.46249 7.46249C8.69 6.23497 10.3549 5.54537 12.0908 5.54537C13.8268 5.54537 15.4916 6.23497 16.7192 7.46249C17.9467 8.69 18.6363 10.3549 18.6363 12.0908C18.6363 13.8268 17.9467 15.4916 16.7192 16.7192C15.4916 17.9467 13.8268 18.6363 12.0908 18.6363ZM12.0908 16.4545C13.2481 16.4545 14.358 15.9947 15.1764 15.1764C15.9947 14.358 16.4545 13.2481 16.4545 12.0908C16.4545 10.9335 15.9947 9.8236 15.1764 9.00526C14.358 8.18692 13.2481 7.72718 12.0908 7.72718C10.9335 7.72718 9.8236 8.18692 9.00526 9.00526C8.18692 9.8236 7.72718 10.9335 7.72718 12.0908C7.72718 13.2481 8.18692 14.358 9.00526 15.1764C9.8236 15.9947 10.9335 16.4545 12.0908 16.4545ZM10.9999 0.0908203H13.1817V3.36355H10.9999V0.0908203ZM10.9999 20.8181H13.1817V24.0908H10.9999V20.8181ZM2.83446 4.377L4.377 2.83446L6.69082 5.14828L5.14828 6.69082L2.83446 4.37809V4.377ZM17.4908 19.0334L19.0334 17.4908L21.3472 19.8046L19.8046 21.3472L17.4908 19.0334ZM19.8046 2.83337L21.3472 4.377L19.0334 6.69082L17.4908 5.14828L19.8046 2.83446V2.83337ZM5.14828 17.4908L6.69082 19.0334L4.377 21.3472L2.83446 19.8046L5.14828 17.4908ZM24.0908 10.9999V13.1817H20.8181V10.9999H24.0908ZM3.36355 10.9999V13.1817H0.0908203V10.9999H3.36355Z" fill=""/>
                </svg>
                <!-- Icon Sun -->
                <img class="xc nm" src="/build/images/icon-moon.svg" alt="Moon" />
              </label>
            </div>

            <!-- <a href="signin.html" :class="{ 'nk yl' : page === 'home', 'ok' : page === 'home' && stickyMenu }" class="ek pk xl">Sign In</a>
            <a href="signup.html" :class="{ 'hh/[0.15]' : page === 'home', 'sh' : page === 'home' && stickyMenu }" class="lk gh dk rg tc wf xf _l gi hi">Sign Up</a> -->
          </div>
        </div>
      </div>
    </header>

    <!-- ===== Header End ===== -->

    <main>
      <!-- ===== Hero Start ===== --> 
      <section class="gj do ir hj sp jr i pg">
        <!-- Hero Images -->
        <div class="xc fn zd/2 2xl:ud-w-187.5 bd 2xl:ud-h-171.5 h q r">
          <img src="/build/images/shape-01.svg" alt="shape" class="xc 2xl:ud-block h t -ud-left-[10%] ua" />
          <img src="/build/images/shape-02.svg" alt="shape" class="xc 2xl:ud-block h u p va" />
          <img src="/build/images/shape-03.svg" alt="shape" class="xc 2xl:ud-block h v w va" />
          <img src="/build/images/shape-04.svg" alt="shape" class="h q r" />
          <img src="/build/images/hero.png" alt="Woman" class="h q r ua rounded-b-lg " style="position: relative; top: 27px; left: 9px;" />
        </div>

        <!-- Hero Content -->
        <div class="bb ze ki xn 2xl:ud-px-0">
          <div class="tc _o">
            <div class="animate_left jn/2">
              <h1 class="fk vj zp or kk wm wb">Trámites Migratorios en Venezuela - Confianza y Eficiencia.</h1>
              <p class="fq">
              Llevamos a cabo tus gestiones con seriedad y profesionalismo, asegurándonos de obtener tus documentos de forma rápida y legalizada para que puedas realizar cualquier trámite necesario.
              </p>

              <div class="tc tf yo zf mb">
                <a href="#" class="ek jk lk gh gi hi rg ml il vc _d _l">¡Solicita tu Trámite Ahora!</a>
                <span class="tc sf">
                  <a href="#" class="inline-block ek xj kk wm"> Llámanos (+58) 424 – 9128806 </a>
                  <span class="inline-block">Para cualquier pregunta o inquietud</span>
                </span>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- ===== Hero End ===== -->

      <!-- ===== Small Features Start ===== -->
      <section id="features">
        <div class="bb ze ki yn 2xl:ud-px-12.5">
          <div class="tc uf zo xf ap zf bp mq">
            <!-- Small Features Item -->
            <div class="animate_top kn to/3 tc cg oq">
              <div class="tc wf xf cf ae cd rg mh">
                <img src="/build/images/icon-01.svg" alt="Icon" />
              </div>
              <div>
                <h4 class="ek yj go kk wm xb"> Atención 24/7</h4>
                <p>Estamos disponibles en todo momento para atender tus dudas y gestionar tus trámites sin importar el día o la hora.</p>
              </div>
            </div>

            <!-- Small Features Item -->
            <div class="animate_top kn to/3 tc cg oq">
              <div class="tc wf xf cf ae cd rg nh">
                <img src="/build/images/icon-02.svg" alt="Icon" />
              </div>
              <div>
                <h4 class="ek yj go kk wm xb">Asesoria Personalizada</h4>
                <p>Te guiamos paso a paso en cada trámite, brindándote la mejor solución según tu caso particular.</p>
              </div>
            </div>

            <!-- Small Features Item -->
            <div class="animate_top kn to/3 tc cg oq">
              <div class="tc wf xf cf ae cd rg oh">
                <img src="/build/images/icon-03.svg" alt="Icon" />
              </div>
              <div>
                <h4 class="ek yj go kk wm xb">Garantía de Servicio</h4>
                <p>Nos comprometemos a brindarte un servicio de calidad y eficiente, asegurando que cada trámite se realice de manera rápida y segura.</p>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- ===== Small Features End ===== -->

      <!-- ===== About Start ===== -->
      <section class="ji gp uq 2xl:ud-py-35 pg">
        <div class="bb ze ki xn wq">
          <div class="tc wf gg qq">
            <!-- About Images -->
            <div class="animate_left xc gn gg jn/2 i">
              <div>
                <img src="/build/images/shape-05.svg" alt="Shape" class="h -ud-left-5 x" />
                <img src="/build/images/about-01.jpg" alt="About" class="ib" />
                <img src="/build/images/about-02.jpg" alt="About" />
              </div>
              <div>
                <img src="/build/images/shape-06.svg" alt="Shape" />
                <img src="/build/images/about-03.jpg" alt="About" class="ob gb" />
                <img src="/build/images/shape-07.svg" alt="Shape" class="bb" />
              </div>
            </div>

            <!-- About Content -->
            <div class="animate_right jn/2">
              <h4 class="ek yj mk gb">¿Por qué elegirnos?</h4>
              <h2 class="fk vj zp pr kk wm qb">Contamos con más de 10 años de experiencia en el área de gestoría en Venezuela</h2>
              <p class="uo">Ofreciendo servicios confiables, eficientes y honestos para facilitar los trámites que muchas personas encuentran complicados o desconocen.</p>

              <div href="https://www.youtube.com/watch?v=xcJtL7QggTI" data-fslightbox class="vc wf hg mb">
                <span class="tc wf xf be dd rg i gh ua">
                  <span class="nf h vc yc vd rg gh qk -ud-z-1"></span>
                  <img src="/build/images/icon-play.svg" alt="Play" />
                </span>
                <span class="kk">EXCELENCIA EN NUESTRO TRABAJO</span>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- ===== About End ===== -->

      <!-- ===== Team Start ===== -->
      <section class="i pg ji gp uq">
        <!-- Bg Shapes -->
        <span class="rc h s r vd fd/5 fh rm"></span>
        <img src="/build/images/shape-08.svg" alt="Shape Bg" class="h q r" />
        <img src="/build/images/shape-09.svg" alt="Shape" class="of h y z/2" />
        <img src="/build/images/shape-10.svg" alt="Shape" class="h _ aa" />
        <img src="/build/images/shape-11.svg" alt="Shape" class="of h m ba" />

        <!-- Section Title Start -->
        <div x-data="{ sectionTitle: `Soluciones Integrales para tu Tranquilidad`, sectionTitleText: `Te ofrecemos un conjunto de servicios diseñados para facilitar tus trámites y brindarte la tranquilidad que necesitas. Desde gestiones migratorias hasta servicios adicionales, nuestro equipo está listo para asesorarte en cada paso del proceso.`}">
          <div class="animate_top bb ze rj ki xn vq">
            <h2 x-text="sectionTitle" class="fk vj pr kk wm on/5 gq/2 bb _b"></h2>
            <p class="bb on/5 wo/5 hq" x-text="sectionTitleText"></p>
          </div>
        </div>
        <!-- Section Title End -->

        <div class="bb ze i va ki xn xq jb jo">
          <div class="wc qf pn xo gg cp">
            <!-- Team Item -->
            <div class="animate_top rj">
              <div class="c i pg z-1">
                <img class="vd" src="/build/images/team-01.png" alt="Team" />

                <div class="ef im nl il">
                  <span class="h -ud-left-5 -ud-bottom-21 rc de gd gh if wa"></span>
                  <span class="h s p rc vd hd mh va"></span>
                  <div class="h s p vd ij jj xa">
                    <!-- Se puede colocar un botón acá -->
                  </div>
                </div>
              </div>

              <h4 class="yj go kk wm ob zb">Trámites Migratorios</h4>
              <p></p>
            </div>

            <!-- Team Item -->
            <div class="animate_top rj">
              <div class="c i pg z-1">
                <img class="vd" src="/build/images/team-02.png" alt="Team" />

                <div class="ef im nl il">
                  <span class="h -ud-left-5 -ud-bottom-21 rc de gd gh if wa"></span>
                  <span class="h s p rc vd hd mh va"></span>
                  <div class="h s p vd ij jj xa">
                    <!-- Se puede colocar un botón acá -->
                  </div>
                </div>
              </div>

              <h4 class="yj go kk wm ob zb">Asesoría Personalizada</h4>
              <p></p>
            </div>

            <!-- Team Item -->
            <div class="animate_top rj">
              <div class="c i pg z-1">
                <img class="vd" src="/build/images/team-03.png" alt="Team" />

                <div class="ef im nl il">
                  <span class="h -ud-left-5 -ud-bottom-21 rc de gd gh if wa"></span>
                  <span class="h s p rc vd hd mh va"></span>
                  <div class="h s p vd ij jj xa">
                    <!-- Se puede colocar un botón acá -->
                  </div>
                </div>
              </div>

              <h4 class="yj go kk wm ob zb">Servicios Adicionales</h4>
              <p></p>
            </div>
          </div>
        </div>
      </section>
      <!-- ===== Team End ===== -->

      <!-- ===== Services Start ===== -->
      <section class="lj tp kr">
        <!-- Section Title Start -->
        <div x-data="{ sectionTitle: `Servicios Migratorios que Ofrecemos`, sectionTitleText: `Te ayudamos a gestionar trámites migratorios de forma rápida y segura. Confía en nuestros expertos para facilitar tu proceso.`}">
          <div class="animate_top bb ze rj ki xn vq">
            <h2 x-text="sectionTitle" class="fk vj pr kk wm on/5 gq/2 bb _b"></h2>
            <p class="bb on/5 wo/5 hq" x-text="sectionTitleText"></p>
          </div>
        </div>
        <!-- Section Title End -->

        <div class="bb ze ki xn yq mb en">
          <div class="wc qf pn xo ng">
            <!-- Service Item -->
            <div class="animate_top sg oi pi zq ml il am cn _m">
              <img src="/build/images/icon-04.svg" alt="Icon" />
              <h4 class="ek zj kk wm nb _b">Solicitud de Acta de Nacimiento ante el Registro Civil</h4>
              <p>Te gestionamos la solicitud de actas de nacimiento en cualquier registro civil en Venezuela, asegurándonos de que todo el proceso se realice correctamente.</p>
            </div>

            <!-- Service Item -->
            <div class="animate_top sg oi pi zq ml il am cn _m">
              <img src="/build/images/icon-05.svg" alt="Icon" />
              <h4 class="ek zj kk wm nb _b">Solicitud de Acta de Matrimonio</h4>
              <p>Solicitud de actas de matrimonio para que puedas obtener este documento legalizado de manera rápida y sin complicaciones.</p>
            </div>

            <!-- Service Item -->
            <div class="animate_top sg oi pi zq ml il am cn _m">
              <img src="/build/images/icon-06.svg" alt="Icon" />
              <h4 class="ek zj kk wm nb _b">Solicitud de Acta de Defunción</h4>
              <p>Te ayudamos a obtener el acta de defunción, un documento fundamental para muchos trámites legales y administrativos.</p>
            </div>

            <!-- Service Item -->
            <div class="animate_top sg oi pi zq ml il am cn _m">
              <img src="/build/images/icon-07.svg" alt="Icon" />
              <h4 class="ek zj kk wm nb _b">Solicitud de Carta de Soltería ante Notaría Pública</h4>
              <p>Si necesitas una carta de soltería, nos encargamos de gestionarla ante la notaría pública, agilizando el proceso para ti.</p>
            </div>

            <!-- Service Item -->
            <div class="animate_top sg oi pi zq ml il am cn _m">
              <img src="/build/images/icon-08.svg" alt="Icon" />
              <h4 class="ek zj kk wm nb _b">Solicitud de Fe de Vida</h4>
              <p>Realizamos la solicitud de Fe de Vida para que puedas presentar este documento ante las autoridades correspondientes o para realizar trámites internacionales.</p>
            </div>

            <!-- Service Item -->
            <div class="animate_top sg oi pi zq ml il am cn _m">
              <img src="/build/images/icon-09.svg" alt="Icon" />
              <h4 class="ek zj kk wm nb _b">Legalización por el Registro Principal</h4>
              <p>Una vez obtenidos los documentos, nos encargamos de legalizarlos por el Registro Principal para darle validez oficial.</p>
            </div>
          </div>
        </div>
      </section>
      <!-- ===== Services End ===== -->

      <!-- ===== Pricing Table Start ===== -->
      <section x-data="setup()" class="i pg fh rm ji gp uq">
        <!-- Bg Shapes -->
        <img src="/build/images/shape-06.svg" alt="Shape" class="h aa y" />
        <img src="/build/images/shape-03.svg" alt="Shape" class="h ca u" />
        <img src="/build/images/shape-07.svg" alt="Shape" class="h w da ee" />
        <img src="/build/images/shape-12.svg" alt="Shape" class="h p s" />
        <img src="/build/images/shape-13.svg" alt="Shape" class="h r q" />

        <!-- Section Title Start -->
        <div x-data="{ sectionTitle: `Servicios adicionales para ti`, sectionTitleText: `Además de trámites migratorios, ofrecemos soluciones integrales para facilitar tu proceso. Descubre cómo podemos ayudarte.`}">
          <div class="animate_top bb ze rj ki xn vq">
            <h2 x-text="sectionTitle" class="fk vj pr kk wm on/5 gq/2 bb _b"></h2>
            <p class="bb on/5 wo/5 hq" x-text="sectionTitleText"></p>
          </div>
        </div>
        <!-- Section Title End -->

        <!-- Pricing switcher -->
        <!-- <div class="tc wf xf jb og">
          <span class="ek kk wm">Bill Monthly</span>
          <button class="i rg gm" x-cloak @click="billPlan == 'monthly' ? billPlan = 'annually' : billPlan = 'monthly'">
            <div class="fe id bl gh rg xk outline-none"></div>
            <div class="h vc wf xf ge jd cl jl ml mf hh rg yk ea fa" :class="{ 'ff': billPlan == 'monthly', 'gf': billPlan == 'annually' }"></div>
          </button>
          <span class="ek kk wm">Bill Annually</span>
        </div> -->

        <!-- Pricing Table -->
        <div class="bb ze i va ki xn yq bc">
          <div class="wc qf pn xo jg">
            <template x-for="(plan, i) in plans" x-key="i">
              <!-- Pricing Item -->
              <div class="animate_top rj sg hh sm vk xm hi nj oj">
                <h4 x-text="plan.name" class="wj kk wm fb"></h4>

                <div class="tc wf xf kg cc">
                  <h2 :class="plan.name == 'Basic' ? 'text-green-500' : ''" x-text="`$${billPlan == 'monthly' ? plan.price.monthly : plan.price.annually}`" class="fk _j kk wm"></h2>
                  <span x-text="billPlan == 'monthly' ? '' : '/per year'" class="sc ak kk wm"></span>
                </div>

                <p class="ur dc">Después de obtener los documentos, llevamos a cabo un proceso de legalización y apostilla, asegurándonos de que los documentos tengan validez en el extranjero</p>

                <!-- Button -->
                <a href="#" class="ek rg lk ml il gi ri" :class="plan.name == 'Growth Plan' ? 'gh sl' : 'mh tl'">¡Solicita Tu Trámite Ahora!</a>

                <!-- Features -->
                <!-- <ul class="tc sf bg ob fb">
                  <template x-for="(feature, i) in plan.features" x-key="i">
                    <li x-text="feature"></li>
                  </template>
                </ul> -->

                <!-- <p class="kk wm">7-day free trial</p> -->
              </div>
            </template>
          </div>
        </div>
      </section>
      <!-- ===== Pricing Table End ===== -->

      <!-- ===== Blog Start ===== -->
      <section class="ji gp uq">
        <!-- Section Title Start -->
        <div x-data="{ sectionTitle: `Tu Aliado en el Camino hacia un Nuevo Destino`, sectionTitleText: `Brindamos orientación especializada para personas que buscan emigrar, ayudándolos a cumplir con los requisitos legales y los trámites necesarios para una transición exitosa.`}">
          <div class="animate_top bb ze rj ki xn vq">
            <h2 x-text="sectionTitle" class="fk vj pr kk wm on/5 gq/2 bb _b"></h2>
            <p class="bb on/5 wo/5 hq" x-text="sectionTitleText"></p>
          </div>
        </div>
        <!-- Section Title End -->

        <div class="bb ye ki xn vq jb jo">
          <div class="wc qf pn xo zf iq">
            <!-- Blog Item -->
            <div class="animate_top sg vk rm xm">
              <div class="c rc i z-1 pg">
                <img class="w-full" src="/build/images/blog-01.png" alt="Blog" />

                <div class="im h r s df vd yc wg tc wf xf al hh/20 nl il z-10">
                  <a href="./blog-single.html" class="vc ek rg lk gh sl ml il gi hi">Read More</a>
                </div>
              </div>

              <div class="yh">
                <h4 class="ek tj ml il kk wm xl eq lb">
                  <a href="blog-single.html">Citas para Visado</a>
                </h4>
                <div class="tc uf wf ag jq">
                  <div class="tc wf ag">
                    <p>Gestionamos citas para visados en los consulados de Chile, México, Perú, España y Ecuador, asegurando un proceso rápido y efectivo.</p>
                  </div>
                </div>
              </div>
            </div>

            <!-- Blog Item -->
            <div class="animate_top sg vk rm xm">
              <div class="c rc i z-1 pg">
                <img class="w-full" src="/build/images/blog-02.png" alt="Blog" />
                <div class="im h r s df vd yc wg tc wf xf al hh/20 nl il z-10">
                  <a href="./blog-single.html" class="vc ek rg lk gh sl ml il gi hi">Read More</a>
                </div>
              </div>

              <div class="yh">
                <h4 class="ek tj ml il kk wm xl eq lb">
                  <a href="blog-single.html">Servicios de Tránsito Terrestre en Venezuela</a>
                </h4>
                <div class="tc uf wf ag jq">
                  <div class="tc wf ag">
                    <p>Tramitamos licencias de conducir de 2da, 3ra, 4ta y 5ta categoría, cartas consulares o certificaciones consulares y licencias internacionales, cumpliendo con todos los procedimientos exigidos.</p>
                  </div>
                </div>
              </div>
            </div>

            <!-- Blog Item -->
            <div class="animate_top sg vk rm xm">
              <div class="c rc i z-1 pg">
                <img class="w-full" src="/build/images/blog-03.png" alt="Blog" />

                <div class="im h r s df vd yc wg tc wf xf al hh/20 nl il z-10">
                  <a href="./blog-single.html" class="vc ek rg lk gh sl ml il gi hi">Read More</a>
                </div>
              </div>

              <div class="yh">
                <h4 class="ek tj ml il kk wm xl eq lb">
                  <a href="blog-single.html">Trámite y Apostilla de Antecedentes Penales</a>
                </h4>
                <div class="tc uf wf ag jq">
                  <div class="tc wf ag">
                    <p>Gestionamos la solicitud y apostilla de antecedentes penales, esenciales para procesos legales y migratorios en otros países.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- ===== Blog End ===== -->
      

      <!-- ===== Testimonials Start ===== -->
      <section class="hj rp hr">
        <!-- Section Title Start -->
        <div x-data="{ sectionTitle: `Voces que inspiran confianza`, sectionTitleText: `Las experiencias de quienes han confiado en nosotros son nuestra mejor carta de presentación. Conoce sus testimonios y descubre cómo hemos hecho posible cada trámite.`}">
          <div class="animate_top bb ze rj ki xn vq">
            <h2 x-text="sectionTitle" class="fk vj pr kk wm on/5 gq/2 bb _b"></h2>
            <p class="bb on/5 wo/5 hq" x-text="sectionTitleText"></p>
          </div>
        </div>
        <!-- Section Title End -->

        <div class="bb ze ki xn ar">
          <div class="animate_top jb cq">
            <!-- Slider main container -->
            <div class="swiper testimonial-01">
              <!-- Additional required wrapper -->
              <div class="swiper-wrapper">
                <!-- Slides -->
                <div class="swiper-slide">
                  <div class="i hh rm sg vk xm bi qj">
                    <!-- Border Shape -->
                    <span class="rc je md/2 gh xg h q r"></span>
                    <span class="rc je md/2 mh yg h q p"></span>

                    <div class="tc sf rn tn un zf dp">
                      

                      <div>
                        <img src="/build/images/icon-quote.svg" alt="Quote" />
                        <p class="ek ik xj _p kc fb">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In dolor diam, feugiat quis enim sed, ullamcorper semper ligula. Mauris consequat justo volutpat.</p>

                        <div class="tc yf vf">
                          <div>
                            <span class="rc ek xj kk wm zb">Devid Smith</span>
                            <span class="rc">Founter @democompany</span>
                          </div>
                          <img class="rk" src="/build/images/brand-light-02.svg" alt="Brand" />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- If we need navigation -->
              <div class="tc wf xf fg jb">
                <div
                  class="swiper-button-prev c tc wf xf ie ld rg _g dh pf ml vr hh rm tl zm rl ym"
                >
                  <svg class="th lm" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3.52366 7.83336L7.99366 12.3034L6.81533 13.4817L0.333663 7.00002L6.81533 0.518357L7.99366 1.69669L3.52366 6.16669L13.667 6.16669L13.667 7.83336L3.52366 7.83336Z" fill=""/>
                  </svg>
                </div>
                <div class="swiper-button-next c tc wf xf ie ld rg _g dh pf ml vr hh rm tl zm rl ym">
                  <svg class="th lm" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10.4763 6.16664L6.00634 1.69664L7.18467 0.518311L13.6663 6.99998L7.18467 13.4816L6.00634 12.3033L10.4763 7.83331H0.333008V6.16664H10.4763Z" fill="" />
                  </svg>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- ===== Testimonials End ===== -->

      <!-- ===== Counter Start ===== -->
      <section class="i pg qh rm ji hp">
        <img src="/build/images/shape-11.svg" alt="Shape" class="of h ga ha ke" />
        <img src="/build/images/shape-07.svg" alt="Shape" class="h ia o ae jf" />
        <img src="/build/images/shape-14.svg" alt="Shape" class="h ja ka" />
        <img src="/build/images/shape-15.svg" alt="Shape" class="h q p" />

        <div class="bb ze i va ki xn br">
          <div class="tc uf sn tn xf un gg">
            <div class="animate_top me/5 ln rj">
              <h2 class="gk vj zp or kk wm hc">450</h2>
              <p class="ek bk aq">Total de trabajos realizados</p>
            </div>
            <div class="animate_top me/5 ln rj">
              <h2 class="gk vj zp or kk wm hc">420</h2>
              <p class="ek bk aq">Clientes satisfechos</p>
            </div>
            <div class="animate_top me/5 ln rj">
              <h2 class="gk vj zp or kk wm hc">10</h2>
              <p class="ek bk aq">Países donde hemos gestionado trámites</p>
            </div>
            <div class="animate_top me/5 ln rj">
              <h2 class="gk vj zp or kk wm hc">10</h2>
              <p class="ek bk aq">Años de experiencia</p>
            </div>
          </div>
        </div>
      </section>
      <!-- ===== Counter End ===== -->

      <!-- ===== Clients Start ===== -->
      

      

      <!-- ===== Contact Start ===== -->
      <section id="support" class="i pg fh rm ji gp uq">
        <!-- Bg Shapes -->
        <img src="/build/images/shape-06.svg" alt="Shape" class="h aa y" />
        <img src="/build/images/shape-03.svg" alt="Shape" class="h ca u" />
        <img src="/build/images/shape-07.svg" alt="Shape" class="h w da ee" />
        <img src="/build/images/shape-12.svg" alt="Shape" class="h p s" />
        <img src="/build/images/shape-13.svg" alt="Shape" class="h r q" />
        

        <!-- Section Title Start -->
        <div x-data="{ sectionTitle: `¡Contáctanos para tus trámites sin fronteras!`, sectionTitleText: `Estamos aquí para facilitar tus trámites migratorios entre Venezuela y Colombia. Completa el formulario y nos pondremos en contacto contigo lo antes posible para ayudarte.`}">
          <div class="animate_top bb ze rj ki xn vq">
            <h2 x-text="sectionTitle" class="fk vj pr kk wm on/5 gq/2 bb _b"></h2>
            <p class="bb on/5 wo/5 hq" x-text="sectionTitleText"></p>
          </div>
        </div>
        <!-- Section Title End -->

        <div class="i va bb ye ki xn wq jb mo">
          <div class="tc uf sn tf rn un zf xl:gap-10">
            <div class="animate_top w-full mn/5 to/3 vk sg hh sm yh rq i pg">
              <!-- Bg Shapes -->
              <img src="/build/images/shape-03.svg" alt="Shape" class="h la x wd" />
              <img src="/build/images/shape-06.svg" alt="Shape" class="h la ma ne kf" />

              <div class="fb">
                <h4 class="wj kk wm cc">Dirección de correo electrónico</h4>
                <p><a href="#">support@startup.com</a></p>
              </div>
              <!-- <div class="fb">
                <h4 class="wj kk wm cc">Office Location</h4>
                <p>76/A, Green valle, Califonia USA.</p>
              </div> -->
              <div class="fb">
                <h4 class="wj kk wm cc">Número de teléfono</h4>
                <p><a href="#">+009 8754 3433 223</a></p>
              </div>
              <!-- <div class="fb">
                <h4 class="wj kk wm cc">Skype Email</h4>
                <p><a href="#">example@yourmail.com</a></p>
              </div> -->

              <span class="rc nd rh tm lc fb"></span>

              <div>
                <h4 class="wj kk wm qb">Redes Sociales</h4>
                <ul class="tc wf fg">
                  <li>
                    <a href="#" class="c tc wf xf ie ld rg ml il tl">
                      <svg class="th lm ml il" width="11" height="20" viewBox="0 0 11 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6.83366 11.3752H9.12533L10.042 7.7085H6.83366V5.87516C6.83366 4.931 6.83366 4.04183 8.667 4.04183H10.042V0.96183C9.74316 0.922413 8.61475 0.833496 7.42308 0.833496C4.93433 0.833496 3.16699 2.35241 3.16699 5.14183V7.7085H0.416992V11.3752H3.16699V19.1668H6.83366V11.3752Z" fill=""/>
                      </svg>
                    </a>
                  </li>
                  <li>
                    <a href="#" class="c tc wf xf ie ld rg ml il tl">
                      <svg class="th lm ml il" width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19.3153 2.18484C18.6155 2.4944 17.8733 2.6977 17.1134 2.78801C17.9144 2.30899 18.5138 1.55511 18.8001 0.666844C18.0484 1.11418 17.2244 1.42768 16.3654 1.59726C15.7885 0.979958 15.0238 0.57056 14.1901 0.432713C13.3565 0.294866 12.5007 0.436294 11.7558 0.835009C11.0108 1.23372 10.4185 1.86739 10.0708 2.63749C9.72313 3.40759 9.63963 4.27098 9.83327 5.09343C8.30896 5.01703 6.81775 4.62091 5.45645 3.93079C4.09516 3.24067 2.89423 2.27197 1.93161 1.08759C1.59088 1.67284 1.41182 2.33814 1.41278 3.01534C1.41278 4.34451 2.08928 5.51876 3.11778 6.20626C2.50912 6.1871 1.91386 6.02273 1.38161 5.72685V5.77451C1.38179 6.65974 1.68811 7.51766 2.24864 8.20282C2.80916 8.88797 3.58938 9.3582 4.45703 9.53376C3.89201 9.68688 3.29956 9.70945 2.72453 9.59976C2.96915 10.3617 3.44595 11.0281 4.08815 11.5056C4.73035 11.9831 5.50581 12.2478 6.30594 12.2627C5.51072 12.8872 4.60019 13.3489 3.62642 13.6213C2.65264 13.8938 1.63473 13.9716 0.630859 13.8503C2.38325 14.9773 4.4232 15.5756 6.50669 15.5737C13.5586 15.5737 17.415 9.73176 17.415 4.66535C17.415 4.50035 17.4104 4.33351 17.4031 4.17035C18.1537 3.62783 18.8016 2.95578 19.3162 2.18576L19.3153 2.18484Z" fill=""/>
                      </svg>
                    </a>
                  </li>
                  <li>
                    <a href="#" class="c tc wf xf ie ld rg ml il tl">
                      <svg class="th lm ml il" width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.36198 2.58327C4.36174 3.0695 4.16835 3.53572 3.82436 3.87937C3.48037 4.22301 3.01396 4.41593 2.52773 4.41569C2.0415 4.41545 1.57528 4.22206 1.23164 3.87807C0.887991 3.53408 0.69507 3.06767 0.695313 2.58144C0.695556 2.09521 0.888943 1.62899 1.23293 1.28535C1.57692 0.941701 2.04333 0.748781 2.52956 0.749024C3.01579 0.749267 3.48201 0.942654 3.82566 1.28664C4.1693 1.63063 4.36222 2.09704 4.36198 2.58327ZM4.41698 5.77327H0.750313V17.2499H4.41698V5.77327ZM10.2103 5.77327H6.56198V17.2499H10.1736V11.2274C10.1736 7.87244 14.5461 7.56077 14.5461 11.2274V17.2499H18.167V9.98077C18.167 4.32494 11.6953 4.53577 10.1736 7.31327L10.2103 5.77327Z"fill=""/>
                      </svg>
                    </a>
                  </li>
                  <li>
                    <a href="#" class="c tc wf xf ie ld rg ml il tl">
                      <svg class="th lm ml il" width="22" height="14" viewBox="0 0 22 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6.82308 0.904297C7.40883 0.904297 7.95058 0.95013 8.44558 1.0858C8.89476 1.16834 9.32351 1.33772 9.70783 1.58446C10.069 1.81088 10.3394 2.12896 10.5191 2.53688C10.6997 2.9448 10.7895 3.44438 10.7895 3.98796C10.7895 4.62321 10.6547 5.1668 10.3394 5.57471C10.069 5.98355 9.61799 6.34563 9.07716 6.61788C9.84349 6.84521 10.4292 7.25313 10.7895 7.79672C11.1507 8.34122 11.3762 9.02138 11.3762 9.7923C11.3762 10.4275 11.2405 10.9711 11.015 11.4249C10.7895 11.8786 10.4292 12.2865 10.0232 12.5588C9.58205 12.8506 9.09443 13.0651 8.58124 13.1931C8.04041 13.3297 7.49958 13.4205 6.95874 13.4205H0.916992V0.904297H6.82308ZM6.46191 5.98263C6.95783 5.98263 7.36391 5.84696 7.67924 5.62055C7.99458 5.39413 8.13024 4.9853 8.13024 4.48663C8.13024 4.21438 8.08441 3.94213 7.99458 3.76155C7.90474 3.58005 7.76908 3.44346 7.58941 3.3078C7.40883 3.21705 7.22824 3.1263 7.00274 3.08138C6.77724 3.03555 6.55266 3.03555 6.28133 3.03555H3.66699V5.98355H6.46283L6.46191 5.98263ZM6.59758 11.3341C6.86799 11.3341 7.13841 11.2883 7.36391 11.2434C7.59159 11.2001 7.80692 11.1071 7.99458 10.9711C8.17826 10.8384 8.33193 10.6685 8.44558 10.4725C8.53541 10.246 8.62616 9.9738 8.62616 9.65663C8.62616 9.02138 8.44558 8.56763 8.08533 8.25046C7.72416 7.97822 7.22824 7.84255 6.64249 7.84255H3.66699V11.335H6.59758V11.3341ZM15.2986 11.2883C15.6588 11.6513 16.1997 11.8328 16.9211 11.8328C17.417 11.8328 17.868 11.6971 18.2282 11.4707C18.5894 11.1985 18.8149 10.9262 18.9047 10.654H21.1139C20.7527 11.742 20.2119 12.513 19.4914 13.0116C18.7691 13.4654 17.9129 13.7376 16.8762 13.7376C16.2128 13.7396 15.5551 13.6165 14.9374 13.3746C14.3816 13.1661 13.886 12.8235 13.4946 12.3773C13.0759 11.9598 12.7665 11.4457 12.5935 10.8804C12.368 10.291 12.2772 9.65663 12.2772 8.93063C12.2772 8.25047 12.368 7.61613 12.5935 7.0258C12.8103 6.45755 13.1311 5.93468 13.5395 5.48396C13.9456 5.07605 14.4415 4.71396 14.9823 4.48663C15.5843 4.24469 16.2274 4.12143 16.8762 4.12363C17.6425 4.12363 18.319 4.26021 18.9047 4.57738C19.4914 4.89455 19.9415 5.25755 20.3027 5.80205C20.6711 6.32503 20.9456 6.90819 21.1139 7.52538C21.2037 8.15972 21.2487 8.79497 21.2037 9.52005H14.667C14.667 10.246 14.9374 10.9262 15.2986 11.2892V11.2883ZM18.1384 6.52713C17.8231 6.20996 17.3272 6.02846 16.7405 6.02846C16.3353 6.02846 16.0191 6.11922 15.7487 6.25488C15.4782 6.39147 15.2986 6.57297 15.118 6.75447C14.952 6.92978 14.8422 7.15067 14.8027 7.3888C14.7568 7.61613 14.7119 7.79672 14.7119 7.97822H18.7691C18.6792 7.29805 18.4537 6.84522 18.1384 6.52713ZM14.1711 1.76596H19.2201V2.99063H14.172V1.76596H14.1711Z" fill=""/>
                      </svg>
                    </a>
                  </li>
                </ul>
              </div>
            </div>

            <div class="animate_top w-full nn/5 vo/3 vk sg hh sm yh tq">
              <form action="https://formbold.com/s/unique_form_id" method="POST">
                <div class="tc sf yo ap zf ep qb">
                  <div class="vd to/2">
                    <label class="rc ac" for="fullname">Nombre</label>
                    <input
                      type="text"
                      name="fullname"
                      id="fullname"
                      placeholder="DEscribe tu nombre aquí"
                      class="vd ph sg zk xm _g ch pm hm dm dn em pl/50 xi mi"
                    />
                  </div>

                  <div class="vd to/2">
                    <label class="rc ac" for="email">Dirección de correo electrónico</label>
                    <input
                      type="email"
                      name="email"
                      id="email"
                      placeholder="example@gmail.com"
                      class="vd ph sg zk xm _g ch pm hm dm dn em pl/50 xi mi"
                    />
                  </div>
                </div>

                <div class="fb">
                  <div class="vd to/2">
                    <label class="rc ac" for="phone">Número de teléfono</label>
                    <input
                      type="text"
                      name="phone"
                      id="phone"
                      placeholder="Escribe tú número de celular"
                      class="vd ph sg zk xm _g ch pm hm dm dn em pl/50 xi mi"
                    />
                  </div>

            

                <div class="fb">
                  <label class="rc ac" for="message">Mensaje</label>
                  <textarea
                    placeholder="Escribe tu mensaje aquí"
                    rows="4"
                    name="message"
                    id="message"
                    class="vd ph sg zk xm _g ch pm hm dm dn em pl/50 ci"
                  ></textarea>
                </div>

                <div class="tc xf">
                  <button class="vc rg lk gh ml il hi gi _l">Envíar Mensaje</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
      <!-- ===== Contact End ===== -->

      <!-- ===== CTA Start ===== -->
      <section class="i pg gh ji">
        <!-- Bg Shape -->
        <img class="h p q" src="/build/images/shape-16.svg" alt="Bg Shape" />

        <div class="bb ye i z-10 ki xn dr">
          <div class="tc uf sn tn un gg">
            <div class="animate_left to/2">
              <h2 class="fk vj zp pr lk ac">Asesoría para renovación de visado y cédula de transeúnte o residente.</h2>
              <p class="lk">Brindamos asesoría especializada para la renovación de visados en Venezuela, asegurándonos de que los residentes con visados vigentes puedan completar el proceso sin inconvenientes. Esto incluye la gestión del visado de transeúnte y la tramitación de la cédula correspondiente, con vigencia acorde al tiempo aprobado por extranjería (desde 1 hasta 5 años).</p>
            </div>
            <div class="animate_right bf">
              <a href="#" class="vc ek kk hh rg ol il cm gi hi">¡Solicita tu Trámite Ahora!</a>
            </div>
          </div>
        </div>
      </section>

      <!-- ===== CTA End ===== -->
    </main>
    <!-- ===== Footer Start ===== -->
    <footer>
      <div class="bb ze ki xn 2xl:ud-px-0">
        <!-- Footer Top -->

        <!-- Footer Bottom -->
        <div class="bh ch pm tc uf sf yo wf xf ap cg fp bj">
          <div class="animate_top">
            <ul class="tc wf gg">
              <li><a href="#" class="xl">Inicio</a></li>
              <li><a href="#" class="xl">Servicios</a></li>
              <li><a href="#" class="xl">Contacto</a></li>
            </ul>
          </div>

          <div class="animate_top"><p>&copy;</p></div>
        </div>
        <!-- Footer Bottom -->
      </div>
    </footer>

    <!-- ===== Footer End ===== -->

    <!-- ====== Back To Top Start ===== -->
    <button
      class="xc wf xf ie ld vg sr gh tr g sa ta _a"
      @click="window.scrollTo({top: 0, behavior: 'smooth'})"
      @scroll.window="scrollTop = (window.pageYOffset > 50) ? true : false"
      :class="{ 'uc' : scrollTop }"
>
      <svg class="uh se qd" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
        <path d="M233.4 105.4c12.5-12.5 32.8-12.5 45.3 0l192 192c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L256 173.3 86.6 342.6c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l192-192z" />
      </svg>
    </button>

    <!-- ====== Back To Top End ===== -->

    <script>
      //  Pricing Table
      const setup = () => {
        return {
          isNavOpen: false,

          billPlan: 'monthly',

          plans: [
            {
              name: 'Proceso de Legalización y Apostilla',
              // price: {
              //   monthly: 29,
              //   annually: 29 * 12 - 199,
              // },
              features: ['400 GB Storaget', 'Unlimited Photos & Videos', 'Exclusive Support'],
            },
            {
              name: 'Apostilla por el Ministerio de Relaciones Exteriores',
              // price: {
              //   monthly: 59,
              //   annually: 59 * 12 - 100,
              // },
              features: ['400 GB Storaget', 'Unlimited Photos & Videos', 'Exclusive Support'],
            },
            {
              name: 'Entrega de Documentos "Personal o por  Encomiendas"',
              // price: {
              //   monthly: 139,
              //   annually: 139 * 12 - 100,
              // },
              features: ['400 GB Storaget', 'Unlimited Photos & Videos', 'Exclusive Support'],
            },
          ],
        };
      };
    </script>
  <script defer src="/build/js/bundle.js"></script></body>
  <!--
</html>-->
