/** @type {import('tailwindcss').Config} */
module.exports = {
   content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js",

  ],
  theme: {
    container : {
      center: true,
      padding: '16px',
    },
    extend: {
      colors:{
        gelap:'#160040',
        sedang: '#4C0070',
        semi:'#79018C',
        terang: '#787A91',
      },
      screens:{
        '2xl':'1320px',
      }
    },
  },
  plugins: [
    require('flowbite/plugin')
  ],
}
