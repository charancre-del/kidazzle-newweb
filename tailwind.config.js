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
          blueDark: '#2F4858',
          purple: '#A855F7',
          purpleLight: '#F3E8FF',
          teal: '#06B6D4',
          tealLight: '#ECFEFF',
          slate: '#475569',
        },
      },
      keyframes: {
        marquee: {
          '0%': { transform: 'translateX(0%)' },
          '100%': { transform: 'translateX(-50%)' },
        },
      },
      animation: {
        marquee: 'marquee 30s linear infinite',
      },
    },
  },
  safelist: [
    // Animations & Delays
    'animate-pulse', 'animate-bounce', 'animate-spin', 'animate-fade-in-up',
    'fade-in-up', 'delay-100', 'delay-200', 'delay-300',

    // Custom shadows
    'shadow-card', 'shadow-cardHover', 'shadow-float', 'shadow-glow', 'shadow-soft',

    // Static utilities
    'w-2', 'h-2', 'rounded-full',

    // Kidazzle base colors (no opacity) - ALL prefixes
    {
      pattern: /(bg|text|border|from|to)-kidazzle-(red|orange|yellow|green|cyan|blue|blueDark|purple|slate|teal)(Light)?$/,
      variants: ['hover', 'group-hover', 'focus'],
    },
    // Kidazzle opacity variants - limit to actually used values
    {
      pattern: /(bg|text|border|from|to)-kidazzle-(red|orange|yellow|green|cyan|blue|blueDark|purple|slate|teal)(Light)?\/(5|10|15|20|30|40|50|80|90)$/,
      variants: ['hover'],
    },

    // Brand base colors
    {
      pattern: /(bg|text|border)-brand-(ink|cream)$/,
      variants: ['hover'],
    },
    // Brand opacity variants
    {
      pattern: /(bg|text|border)-brand-(ink|cream)\/(5|10|20|30|40|50|60|70|80|90)$/,
      variants: ['hover'],
    },
  ],
  plugins: [],
};

