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
          ink: '#0F172A', // Slate 900
          cream: '#F8FAFC', // Slate 50
        },
        // Kidazzle Colors (Extracted from HTML)
        kidazzle: {
          red: '#EF4444',
          redLight: '#FEF2F2',
          orange: '#F97316',
          orangeLight: '#FFF7ED',
          yellow: '#EAB308',
          yellowLight: '#FEFCE8',
          green: '#22C55E',
          greenLight: '#F0FDF4',
          cyan: '#06B6D4',
          cyanLight: '#ECFEFF',
          blue: '#3B82F6',
          blueLight: '#EFF6FF',
          purple: '#A855F7',
          purpleLight: '#F3E8FF',
          slate: '#475569',
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
    // Dynamic Kidazzle Colors (bg, text, border, gradients)
    {
      pattern: /(bg|text|border|from)-kidazzle-(red|orange|yellow|green|cyan|blue|purple|slate)(Light)?/,
      variants: ['hover', 'group-hover'],
    },
    // Opacity variants for backgrounds and borders
    {
      pattern: /(bg|border|from)-kidazzle-(red|orange|yellow|green|cyan|blue|purple|slate)(Light)?\/(5|10|15|30|50)/,
      variants: ['hover'],
    },
  ],
  plugins: [],
};
