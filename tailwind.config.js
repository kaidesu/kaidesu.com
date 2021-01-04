const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
  purge: ['./storage/framework/views/*.php', './resources/views/**/*.blade.php'],

  theme: {
    extend: {
      fontFamily: {
        sans: ['Inter var', ...defaultTheme.fontFamily.sans],
        mono: ['Ubuntu Mono', 'monospace'],
      },
    },
  },

  variants: {
    extend: {
      opacity: ['disabled'],
    },
  },

  plugins: [
    require('@tailwindcss/typography')
  ],
};