/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './*.php',
    './inc/**/*.php',
    './template-parts/**/*.php',
    './assets/js/**/*.js',
  ],
  theme: {
    extend: {
      fontFamily: {
        sans: ['Outfit', 'system-ui', 'sans-serif'],
        serif: ['Playfair Display', 'ui-serif', 'Georgia', 'serif'],
      },
      colors: {
        brand: {
          ink: '#263238',
          cream: '#FFFCF8',
          navy: '#4A6C7C',
        },
        kidazzle: {
          red: '#A84B38', // Darkened from #D67D6B for 4.5:1 contrast
          redLight: '#F4E5E2',
          orange: '#C26524', // Darkened from #E89654 for 4.5:1 contrast
          orangeLight: '#FEF0E6',
          blue: '#4A6C7C',
          blueDark: '#2F4858',
          blueLight: '#E3E9EC',
          green: '#4A7C59',
          greenLight: '#E3ECE6',
          yellow: '#C2A024',
          yellowLight: '#FEF8E6',
          purple: '#7D5BA6',
          purpleLight: '#F3EBF9',
          teal: '#248EC2',
          tealLight: '#E6F4FE',
        },
      },
    },
  },
  safelist: [
    // Pulse animation classes for status indicators
    'animate-pulse',
    'w-2',
    'h-2',
    'rounded-full',
    // Dynamic kidazzle Colors (bg, text, border, gradients)
    {
      pattern: /(bg|text|border|from)-kidazzle-(red|blue|green|yellow|purple|orange|teal)(Light|Dark)?/,
      variants: ['hover', 'group-hover'],
    },
    // Opacity variants for backgrounds and borders
    {
      pattern: /(bg|border|from)-kidazzle-(red|blue|green|yellow|purple|orange|teal)(Light|Dark)?\/(5|10|15|30|50)/,
      variants: ['hover'],
    },
  ],
  plugins: [],
};


