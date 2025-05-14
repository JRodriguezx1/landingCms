
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
          <a class="w-16" href="/" rel="nofollow">
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
              <li><a href="/" rel="nofollow" class="xl" :class="{ 'mk': page === 'home' }">Inicio</a></li>
              <li><a href="#servicios" rel="nofollow" class="xl">Servicios</a></li>
              <li class="c i" x-data="{ dropdown: false }">
                <a
                  href="#support" rel="nofollow"
                  class="xl tc wf yf bg"
                  :class="{ 'mk': page === 'blog-grid' || page === 'blog-single' || page === 'signin' || page === 'signup' || page === '404' }"
                >
                  Contacto
                </a>
              </li>
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
          <img src="/build/images/shape-04.svg" alt="shape" class="h q r" />
          <img src="/build/images/hero.png" alt="Woman" class="h q r ua rounded-b-lg " style="position: relative; top: 27px; left: 9px;" />
        </div>

        <?php include __DIR__. "/../templates/alertas.php"; ?>

        <!-- Hero Content -->
        <div class="bb ze ki xn 2xl:ud-px-0">
          <div class="tc _o">
            <div class="animate_left jn/2">
              <h1 class="fk vj zp or kk wm wb"><?php echo $blocks[0]->contenido??''; ?></h1>
              <p class="fq"><?php echo  $blocks[1]->contenido??'';?>
              <div class="tc tf yo zf mb">
                <a href="https://api.whatsapp.com/send?phone=573147102077" rel="nofollow" class="ek jk lk gh gi hi rg ml il vc _d _l">¡Solicita tu Trámite Ahora!</a>
                <span class="tc sf">
                  <a href="https://api.whatsapp.com/send?phone=573147102077" rel="nofollow" class="inline-block ek xj kk wm"> Llámanos <?php echo  $blocks[2]->contenido??'';?> </a>
                  <span class="inline-block">Para cualquier pregunta o inquietud</span>
                </span>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- ===== Hero End ===== -->

      <!-- ===== Small Features Start ===== -->
      <section id="features" class="bb ze ki yn 2xl:ud-px-12.5">
          <div class="tc uf zo xf ap zf bp mq">
            <!-- Small Features Item -->
            <div class="animate_top kn to/3 tc cg oq">
              <div class="tc wf xf cf ae cd rg mh">
                <img src="/build/images/icon-01.svg" alt="Icon" />
              </div>
              <div>
                <h4 class="ek yj go kk wm xb"><?php echo $blocks[3]->contenido??'';?></h4>
                <p><?php echo  $blocks[4]->contenido??'';?></p>
              </div>
            </div>

            <!-- Small Features Item -->
            <div class="animate_top kn to/3 tc cg oq">
              <div class="tc wf xf cf ae cd rg nh">
                <img src="/build/images/icon-02.svg" alt="Icon" />
              </div>
              <div>
                <h4 class="ek yj go kk wm xb"><?php echo  $blocks[5]->contenido??'';?></h4>
                <p><?php echo  $blocks[6]->contenido??'';?></p>
              </div>
            </div>

            <!-- Small Features Item -->
            <div class="animate_top kn to/3 tc cg oq">
              <div class="tc wf xf cf ae cd rg oh">
                <img src="/build/images/icon-03.svg" alt="Icon" />
              </div>
              <div>
                <h4 class="ek yj go kk wm xb"><?php echo  $blocks[7]->contenido??'';?></h4>
                <p><?php echo  $blocks[8]->contenido??'';?></p>
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
              <h2 class="fk vj zp pr kk wm qb"><?php echo  $blocks[9]->contenido??'';?></h2>
              <p class="uo"><?php echo  $blocks[10]->contenido??'';?></p>

              <div href="https://www.youtube.com/watch?v=xcJtL7QggTI" rel="nofollow" data-fslightbox class="vc wf hg mb">
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
      <section id="servicios" class="i pg ji gp uq">
        <!-- Bg Shapes -->
        <span class="rc h s r vd fd/5 fh rm"></span>
        <img src="/build/images/shape-08.svg" alt="Shape Bg" class="h q r" />
        <img src="/build/images/shape-10.svg" alt="Shape" class="h v aa xc fn" />
        <img src="/build/images/shape-11.svg" alt="Shape" class="of h m xc fn" />

        <!-- Section Title Start -->
        <div x-data="{ sectionTitle: `<?php echo $blocks[11]->contenido??'';?>`, sectionTitleText: `<?php echo $blocks[12]->contenido??'';?>`}">
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

              <h4 class="yj go kk wm ob zb"><?php echo $blocks[13]->contenido??'';?></h4>
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

              <h4 class="yj go kk wm ob zb"><?php echo $blocks[14]->contenido??'';?></h4>
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

              <h4 class="yj go kk wm ob zb"><?php echo $blocks[15]->contenido??'';?></h4>
              <p></p>
            </div>
          </div>
        </div>
      </section>
      <!-- ===== Team End ===== -->

      <!-- ===== Services Start ===== -->
      <section class="lj tp kr">
        <!-- Section Title Start -->
        <div x-data="{ sectionTitle: <?php echo $blocks[16]->contenido??'';?>`, sectionTitleText: `<?php echo $blocks[17]->contenido??'';?>`}">
          <div class="bb ze rj ki xn vq">
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
              <h4 class="ek zj kk wm nb _b"><?php echo $blocks[18]->contenido??'';?></h4>
              <p><?php echo $blocks[19]->contenido??'';?></p>
            </div>

            <!-- Service Item -->
            <div class="animate_top sg oi pi zq ml il am cn _m">
              <img src="/build/images/icon-05.svg" alt="Icon" />
              <h4 class="ek zj kk wm nb _b"><?php echo $blocks[20]->contenido??'';?></h4>
              <p><?php echo $blocks[21]->contenido??'';?></p>
            </div>

            <!-- Service Item -->
            <div class="animate_top sg oi pi zq ml il am cn _m">
              <img src="/build/images/icon-06.svg" alt="Icon" />
              <h4 class="ek zj kk wm nb _b"><?php echo $blocks[22]->contenido??'';?></h4>
              <p><?php echo $blocks[23]->contenido??'';?></p>
            </div>

            <!-- Service Item -->
            <div class="animate_top sg oi pi zq ml il am cn _m">
              <img src="/build/images/icon-07.svg" alt="Icon" />
              <h4 class="ek zj kk wm nb _b"><?php echo $blocks[24]->contenido??'';?></h4>
              <p><?php echo $blocks[25]->contenido??'';?></p>
            </div>

            <!-- Service Item -->
            <div class="animate_top sg oi pi zq ml il am cn _m">
              <img src="/build/images/icon-08.svg" alt="Icon" />
              <h4 class="ek zj kk wm nb _b"><?php echo $blocks[26]->contenido??'';?></h4>
              <p><?php echo $blocks[27]->contenido??'';?></p>
            </div>

            <!-- Service Item -->
            <div class="animate_top sg oi pi zq ml il am cn _m">
              <img src="/build/images/icon-09.svg" alt="Icon" />
              <h4 class="ek zj kk wm nb _b"><?php echo $blocks[28]->contenido??'';?></h4>
              <p><?php echo $blocks[29]->contenido??'';?></p>
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
        <div x-data="{ sectionTitle: `<?php echo $blocks[30]->contenido??'';?>`, sectionTitleText: `<?php echo $blocks[31]->contenido??'';?>`}">
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

        <!-- Pricing Table SERVICIOS ADICIONALES -->
        <div class="bb ze i va ki xn yq bc">
          <div class="wc qf pn xo jg">
            <template x-for="(plan, i) in plans" x-key="i">
              <!-- Pricing Item -->
              <div class="animate_top rj sg hh sm vk xm hi nj oj">
                <h4 x-text="plan.name" class="wj kk wm fb"></h4>
                <!--<div class="tc wf xf kg cc">
                  <h2 :class="plan.name == 'Basic' ? 'text-green-500' : ''" x-text="`$${billPlan == 'monthly' ? plan.price.monthly : plan.price.annually}`" class="fk _j kk wm"></h2>
                  <span x-text="billPlan == 'monthly' ? '' : '/per year'" class="sc ak kk wm"></span>
                </div>-->
                <p class="ur dc" x-text="plan.descripcion"></p>
                <!-- Button -->
                <a href="https://api.whatsapp.com/send?phone=573147102077" rel="nofollow" class="ek rg lk ml il gi pi" :class="plan.name == 'Growth Plan' ? 'gh sl' : 'mh tl'">¡Solicita Tu Trámite Ahora!</a>
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
        <div x-data="{ sectionTitle: `<?php echo $blocks[32]->contenido??'';?>`, sectionTitleText: `<?php echo $blocks[33]->contenido??'';?>`}">
          <div class="animate_top bb ze rj ki xn vq">
            <h2 x-text="sectionTitle" class="fk vj pr kk wm on/5 gq/2 bb _b"></h2>
            <p class="bb on/5 wo/5 hq" x-text="sectionTitleText"></p>
          </div>
        </div>
        <!-- Section Title End -->

        <div class="bb ye ki xn vq jb jo">
          <div class="wc qf pn xo zf iq">
            <!-- Blog Item -->
            <div class=" sg vk rm xm">
              <div class="c rc i z-1 pg">
                <img class="w-full" src="/build/images/blog-01.png" alt="Blog" />

                <div class="im h r s df vd yc wg tc wf xf al hh/20 nl il z-10">
                  <a href="#support" rel="nofollow" class="vc ek rg lk gh sl ml il gi hi">Solicitar Ahora</a>
                </div>
              </div>

              <div class="yh">
                <h4 class="ek tj ml il kk wm xl eq lb">
                  <p href="#" rel="nofollow"><?php echo $blocks[34]->contenido??'';?></p>
                </h4>
                <div class="tc uf wf ag jq">
                  <div class="tc wf ag">
                    <p><?php echo $blocks[35]->contenido??'';?></p>
                  </div>
                </div>
              </div>
            </div>

            <!-- Blog Item -->
            <div class=" sg vk rm xm">
              <div class="c rc i z-1 pg">
                <img class="w-full" src="/build/images/blog-02.png" alt="Blog" />
                <div class="im h r s df vd yc wg tc wf xf al hh/20 nl il z-10">
                  <a href="#support" rel="nofollow" class="vc ek rg lk gh sl ml il gi hi">Solicitar Ahora</a>
                </div>
              </div>

              <div class="yh">
                <h4 class="ek tj ml il kk wm xl eq lb">
                  <p href="#" rel="nofollow"><?php echo $blocks[36]->contenido??'';?></p>
                </h4>
                <div class="tc uf wf ag jq">
                  <div class="tc wf ag">
                    <p><?php echo $blocks[37]->contenido??'';?></p>
                  </div>
                </div>
              </div>
            </div>

            <!-- Blog Item -->
            <div class=" sg vk rm xm">
              <div class="c rc i z-1 pg">
                <img class="w-full" src="/build/images/blog-03.png" alt="Blog" />

                <div class="im h r s df vd yc wg tc wf xf al hh/20 nl il z-10">
                  <a href="#support" rel="nofollow" class="vc ek rg lk gh sl ml il gi hi">Solicitar Ahora</a>
                </div>
              </div>

              <div class="yh">
                <h4 class="ek tj ml il kk wm xl eq lb">
                  <p href="#" rel="nofollow"><?php echo $blocks[38]->contenido??'';?></p>
                </h4>
                <div class="tc uf wf ag jq">
                  <div class="tc wf ag">
                    <p><?php echo $blocks[39]->contenido??'';?></p>
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
                        <p class="ek ik xj _p kc fb">A través de un familiar los contacte, y la verdad las referencia que me dio mi hermana rebasaron mis expectativas, quede súper satisfecho con su trabajo tan profesional y eficiente... Gracias</p>

                        <div class="tc yf vf">
                          <div>
                            <span class="rc ek xj kk wm zb">Yui Sun Yan Hung</span>
                            <span class="rc">Fuente: yuiyanh1942@gmail.com</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="swiper-slide">
                  <div class="i hh rm sg vk xm bi qj">
                    <!-- Border Shape -->
                    <span class="rc je md/2 gh xg h q r"></span>
                    <span class="rc je md/2 mh yg h q p"></span>

                    <div class="tc sf rn tn un zf dp">
                      

                      <div>
                        <img src="/build/images/icon-quote.svg" alt="Quote" />
                        <p class="ek ik xj _p kc fb">Muchas gracias por la gestión. Había tenido Malas experiencias en el pasado, pero llegar acá fue la mejor decisión, me brindaron apoyo y mucha confianza. Realmente tienen un excelente servicio.</p>

                        <div class="tc yf vf">
                          <div>
                            <span class="rc ek xj kk wm zb">Cindy Domínguez</span>
                            <span class="rc">Fuente: cindydominguezs.99@gmail.com</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="swiper-slide">
                  <div class="i hh rm sg vk xm bi qj">
                    <!-- Border Shape -->
                    <span class="rc je md/2 gh xg h q r"></span>
                    <span class="rc je md/2 mh yg h q p"></span>

                    <div class="tc sf rn tn un zf dp">
                      

                      <div>
                        <img src="/build/images/icon-quote.svg" alt="Quote" />
                        <p class="ek ik xj _p kc fb">Sin tu apoyo, no sé si lo hubiera logrado. Gracias por acompañarme todo el proceso del trámite. Gracias por cada minuto de tu atención y dedicación. Mi corazón tiene una enorme gratitud por todo lo que has hecho hoy día tengo mi pasaporte y visa por tu gestión, sinceramente un excelente servicio, fuiste una recomendación de mi primo y la verdad te recomendaré mil veces por qué es lo mejor de lo mejor. </p>

                        <div class="tc yf vf">
                          <div>
                            <span class="rc ek xj kk wm zb">Antonio Blanco</span>
                            <span class="rc">Fuente: ajbbantonio@gmail.com</span>
                          </div>
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
                  <svg class="th lm" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="https://www.instagram.com/tramitessinfronteras7/">
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
      <section id="contador_num" class="i pg qh rm ji hp indicadorNum">
        <img src="/build/images/shape-11.svg" alt="Shape" class="of h ga ha ke" />
        <img src="/build/images/shape-07.svg" alt="Shape" class="h ia o ae jf" />
        <img src="/build/images/shape-14.svg" alt="Shape" class="h ja ka" />
        <img src="/build/images/shape-15.svg" alt="Shape" class="h q p" />

        <div class="bb ze i va ki xn br">
          <div class="tc uf sn tn xf un gg">
            <div class="animate_top me/5 ln rj">
              <h2 data-valor="450" class="count_num gk vj zp or kk wm hc">0+</h2>
              <p class="ek bk aq">Total de trabajos realizados</p>
            </div>
            <div class="animate_top me/5 ln rj">
              <h2 data-valor="420" class="count_num gk vj zp or kk wm hc">0+</h2>
              <p class="ek bk aq">Clientes satisfechos</p>
            </div>
            <div class="animate_top me/5 ln rj">
              <h2 data-valor="10" class="count_num gk vj zp or kk wm hc">0+</h2>
              <p class="ek bk aq">Países donde hemos gestionado trámites</p>
            </div>
            <div class="animate_top me/5 ln rj">
              <h2 data-valor="10" class="count_num gk vj zp or kk wm hc">0+</h2>
              <p class="ek bk aq">Años de experiencia</p>
            </div>
          </div>
        </div>
      </section>
      <!-- ===== Counter End ===== -->
      

      <!-- ===== Contact Start ===== -->
      <section id="support" class="i pg fh rm ji gp uq">
        <!-- Bg Shapes -->
        <img src="/build/images/shape-03.svg" alt="Shape" class="h ca u" />
        <img src="/build/images/shape-07.svg" alt="Shape" class="h w da ee" />
        <img src="/build/images/shape-12.svg" alt="Shape" class="h p s" />
        <img src="/build/images/shape-13.svg" alt="Shape" class="h r q" />

        <!-- Section Title Start -->
        <div x-data="{ sectionTitle: `<?php echo $blocks[40]->contenido??'';?>`, sectionTitleText: `<?php echo $blocks[41]->contenido??'';?>`}">
          <div class="bb ze rj ki xn vq">
            <h2 x-text="sectionTitle" class="fk vj pr kk wm on/5 gq/2 bb _b"></h2>
            <p class="bb on/5 wo/5 hq" x-text="sectionTitleText"></p>
          </div>
        </div>
        <!-- Section Title End -->

        <div class="i va bb ye ki xn wq jb mo">
          <div class="tc uf sn tf rn un zf xl:gap-10">
            <div class="w-full mn/5 to/3 vk sg hh sm yh rq i pg">
              <!-- Bg Shapes -->
              <img src="/build/images/shape-03.svg" alt="Shape" class="h la x wd" />
              <img src="/build/images/shape-06.svg" alt="Shape" class="h la ma ne kf" />

              <div class="fb">
                <h4 class="wj kk wm cc">Dirección de correo electrónico</h4>
                <p><a href="#contanto" rel="nofollow">tramitessinfronteras7@gmail.com</a></p>
              </div>
              <!-- <div class="fb">
                <h4 class="wj kk wm cc">Office Location</h4>
                <p>76/A, Green valle, Califonia USA.</p>
              </div> -->
              <div class="fb">
                <h4 class="wj kk wm cc">Número de teléfono</h4>
                <p><a href="https://api.whatsapp.com/send?phone=573147102077" rel="nofollow">+57 314 7102077</a></p>
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
                    <a href="https://www.facebook.com/profile.php?id=61573522004800&mibextid=wwXIfr&rdid=paCMaKgrbjAoYzaa&share_url=https%3A%2F%2Fwww.facebook.com%2Fshare%2F1A4Y9keyJX%2F%3Fmibextid%3DwwXIfr#" rel="nofollow" class="c tc wf xf ie ld rg ml il tl">
                      <svg class="th lm ml il" width="11" height="20" viewBox="0 0 11 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6.83366 11.3752H9.12533L10.042 7.7085H6.83366V5.87516C6.83366 4.931 6.83366 4.04183 8.667 4.04183H10.042V0.96183C9.74316 0.922413 8.61475 0.833496 7.42308 0.833496C4.93433 0.833496 3.16699 2.35241 3.16699 5.14183V7.7085H0.416992V11.3752H3.16699V19.1668H6.83366V11.3752Z" fill=""/>
                      </svg>
                    </a>
                  </li>
                  <li>
                    <a href="https://www.tiktok.com/@tramitessinfronteras70" class="c tc wf xf ie ld rg ml il tl" rel="nofollow">
                      <svg width="16" height="26" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path fill="#79808a" d="M448 209.9a210.1 210.1 0 0 1 -122.8-39.3V349.4A162.6 162.6 0 1 1 185 188.3V278.2a74.6 74.6 0 1 0 52.2 71.2V0l88 0a121.2 121.2 0 0 0 1.9 22.2h0A122.2 122.2 0 0 0 381 102.4a121.4 121.4 0 0 0 67 20.1z"/>
                      </svg>
                    </a>
                  </li>
                  <li>
                    <a href="https://www.instagram.com/tramitessinfronteras7/" class="c tc wf xf ie ld rg ml il tl" rel="nofollow">
                      <svg class="th lm ml il" width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.36198 2.58327C4.36174 3.0695 4.16835 3.53572 3.82436 3.87937C3.48037 4.22301 3.01396 4.41593 2.52773 4.41569C2.0415 4.41545 1.57528 4.22206 1.23164 3.87807C0.887991 3.53408 0.69507 3.06767 0.695313 2.58144C0.695556 2.09521 0.888943 1.62899 1.23293 1.28535C1.57692 0.941701 2.04333 0.748781 2.52956 0.749024C3.01579 0.749267 3.48201 0.942654 3.82566 1.28664C4.1693 1.63063 4.36222 2.09704 4.36198 2.58327ZM4.41698 5.77327H0.750313V17.2499H4.41698V5.77327ZM10.2103 5.77327H6.56198V17.2499H10.1736V11.2274C10.1736 7.87244 14.5461 7.56077 14.5461 11.2274V17.2499H18.167V9.98077C18.167 4.32494 11.6953 4.53577 10.1736 7.31327L10.2103 5.77327Z"fill=""/>
                      </svg>
                    </a>
                  </li>
                  
                </ul>
              </div>
            </div>

            <div class="w-full nn/5 vo/3 vk sg hh sm yh tq">
              <form action="/formcontacto" method="post">
                <div class="tc sf yo ap zf ep qb">
                  <div class="vd to/2">
                    <label class="rc ac" for="nombre">Nombre</label>
                    <input
                      type="text"
                      name="nombre"
                      id="nombre"
                      placeholder="tu nombre aquí"
                      class="vd ph sg zk xm _g ch pm hm dm dn em pl/50 xi mi"
                      required
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
                      required
                    />
                  </div>
                </div>

                <div class="fb">
                  <div class="vd to/2">
                    <label class="rc ac" for="telefono">Número de teléfono</label>
                    <input
                      type="text"
                      name="telefono"
                      id="telefono"
                      placeholder="Escribe tú número de celular"
                      class="vd ph sg zk xm _g ch pm hm dm dn em pl/50 xi mi"
                      required
                    />
                  </div>



                <div class="fb">
                  <label class="rc ac" for="mensaje">Mensaje</label>
                  <textarea
                    placeholder="Escribe tu mensaje aquí"
                    rows="4"
                    name="mensaje"
                    id="mensaje"
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
              <a href="https://api.whatsapp.com/send?phone=573147102077" rel="nofollow" class="vc ek kk hh rg ol il cm gi hi">¡Solicita tu Trámite Ahora!</a>
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
        <div class="bh ch pm tc uf yo wf xf cg bj">
          <div class="">
            <ul class="tc wf gg">
              <li><a href="#" class="xl" rel="nofollow">Inicio</a></li>
              <li><a href="#servicios" rel="nofollow" class="xl">Servicios</a></li>
              <li><a href="#support" rel="nofollow" class="xl">Contacto</a></li>
            </ul>
          </div>

          <div class=""><p>&copy;</p></div>
        </div>
        <!-- Footer Bottom -->
      </div>
    </footer>

    <!-- ===== Footer End ===== -->

    <div class="btn-ws">
      <a href="https://api.whatsapp.com/send?phone=573147102077" rel="nofollow"
      target="_blank"><img loading="lazy" src="/build/images/icons-whatsapp-verde.png" alt="whatsapp-negocio"></a>
    </div>


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

          plans: <?php echo json_encode(array_map(fn($s) => [
            'name' => $s->titulo,
            'descripcion' => $s->contenido
            /*{
              name: 'Proceso de Legalización y Apostilla',
              // price: {
              //   monthly: 29,
              //   annually: 29 * 12 - 199,
              // },
              descripcion: 'Después de obtener los documentos, llevamos a cabo un proceso de legalización y apostilla, asegurándonos de que los documentos tengan validez en el extranjero',
              features: ['400 GB Storaget', 'Unlimited Photos & Videos', 'Exclusive Support'],
            },
            {
              name: 'Apostilla por el Ministerio de Relaciones Exteriores',
              // price: {
              //   monthly: 59,
              //   annually: 59 * 12 - 100,
              // },
              descripcion: 'apostillamos los documentos ante la Cancillería de Venezuela, lo que les otorga validez internacional.',
              features: ['400 GB Storaget', 'Unlimited Photos & Videos', 'Exclusive Support'],
            },
            {
              name: 'Entrega de Documentos "Personal o por  Encomiendas"',
              // price: {
              //   monthly: 139,
              //   annually: 139 * 12 - 100,
              // },
              descripcion: 'Una vez completado el proceso, entregamos los documentos al cliente personalmente o por empresa de encomienda',
              features: ['400 GB Storaget', 'Unlimited Photos & Videos', 'Exclusive Support'],
            },*/
            
          ], $serviciosadicionales)); ?>
        };

      };
    </script>
  
  <!--
</html>-->