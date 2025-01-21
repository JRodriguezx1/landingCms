/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./views/**/*.{html,php}"], //busca en la raiz del proyecto la carpeta view y en todas las carpetas adentro los archivos de extension .html y .php
  theme: {
    extend: {
      screens: {
        'xxs': '480px',
        'xs': '540px',
        'tlg': '992px', // Breakpoint personalizado de 992px
      },
    },
  },
  plugins: [],
}

