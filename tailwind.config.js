/** @type {import('tailwindcss').Config} */
module.exports = {
  darkMode: 'class',
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        primary: '#2A2F64',
        second: '#DEFC7B', 
        third: '#EDF4F6', 
      },
    },
  },
  plugins: [],
}