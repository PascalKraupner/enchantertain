/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  safelist: [
    'bg-gray-600',
    'bg-green-600',
    'bg-orange-600',
    'bg-red-600',
  ],
  theme: {
    extend: {},
    spinner: (theme) => ({
      default: {
        color: '#dae1e7',
        size: '2em',
        border: '4px',
        speed: '700ms',
      },
    }),
  },
  plugins: [
    require('tailwindcss-spinner')({ className: 'spinner', themeKey: 'spinner' }),
  ],
}
