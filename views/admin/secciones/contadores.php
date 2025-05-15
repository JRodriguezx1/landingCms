<div class="box contadores">
    <h4 class="text-gray-600 mb-8">Contadores</h4>

    <section class="py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
          <div class="rounded-2xl py-10 px-10 xl:py-16 xl:px-20 bg-gray-50 flex items-center justify-between flex-col lg:gap-6 xl:gap-16 lg:flex-row">
            <div class="w-full lg:w-60">
              <h2 class="font-manrope text-4xl font-bold text-gray-900 mb-4 text-center lg:text-left">
                Nuestras Estadisticas
              </h2>
              <p class="text-base text-gray-500 leading-6 text-center lg:text-left">
                We help you to unleash the power within your business
              </p>
            </div>
            <div class="w-full lg:w-4/5">
              <div class="flex flex-col flex-1 gap-4 lg:gap-0 lg:flex-row lg:justify-end border rounded-xl bg-white">
                
                <?php foreach($contadores as $contador): ?>
                  <div class="flex-1 py-4 ">
                    <div class="font-manrope font-bold text-4xl text-indigo-600 mb-3 text-center">
                      <input data-idcontador="<?php echo $contador->id??'1';?>" class="inputcontadores text-center w-32 px-2 border rounded-lg" type="text" value="<?php echo $contador->numero??'';?>" oninput="this.value = parseInt(this.value.replace(/[,.]/g, '')||0)">
                    </div>
                    <span class="text-gray-700 text-center block text-xl"><?php echo $contador->descripcion??'';?></span>
                  </div>
                <?php endforeach; ?>
                <!-- onkeypress="return event.charCode >= 48 && event.charCode <= 57" oninput="this.value = this.value.replace(/\D/g, '')|| '1'" -->
              </div>
              
            </div>
          </div>
        </div>
    </section>
    
</div>