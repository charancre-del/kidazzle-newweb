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
        // Existing Chroma colors preserved
        chroma: {
          red: '#A84B38',
          redLight: '#F4E5E2',
          orange: '#C26524',
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
        // New Design Colors
        indigo: {
          50: '#eef2ff',
          100: '#e0e7ff',
          200: '#c7d2fe',
          300: '#a5b4fc',
          400: '#818cf8',
          500: '#6366f1',
          600: '#4f46e5',
          700: '#4338ca',
          800: '#3730a3',
          900: '#312e81',
          950: '#1e1b4b',
        },
        yellow: {
          400: '#facc15',
          500: '#eab308',
          600: '#ca8a04',
        },
        pink: {
          500: '#ec4899',
          900: '#831843',
        },
        green: {
          500: '#22c55e',
        },
      },
      keyframes: {
        'fade-in': {
          '0%': { opacity: '0' },
          '100%': { opacity: '1' },
        },
        'fade-in-down': {
          '0%': { opacity: '0', transform: 'translateY(-10px)' },
          '100%': { opacity: '1', transform: 'translateY(0)' },
        }
      },
      animation: {
        'fade-in': 'fade-in 0.5s ease-out',
        'fade-in-down': 'fade-in-down 0.3s ease-out',
      }
    },
  },
  safelist: [
    'animate-pulse',
    'w-2',
    'h-2',
    'rounded-full',
    {
      pattern: /(bg|text|border|from)-chroma-(red|blue|green|yellow|purple|orange|teal)(Light|Dark)?/,
      variants: ['hover', 'group-hover'],
    },
    {
      pattern: /(bg|border|from)-chroma-(red|blue|green|yellow|purple|orange|teal)(Light|Dark)?\/(5|10|15|30|50)/,
      variants: ['hover'],
    },
    // Safelist new design classes if dynamic
    'bg-indigo-900', 'text-yellow-400', 'bg-yellow-400', 'text-indigo-900',
  ],
  plugins: [],
};
