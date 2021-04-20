module.exports = {
  mode: 'jit',
  purge: {
    content: [
      'source/**/*.html',
      'source/**/*.md',
      'source/**/*.js',
      'source/**/*.php',
      'source/**/*.vue',
    ],

    // These options are passed through directly to PurgeCSS
    options: {
      safelist: [
        /language/,
        /hljs/
      ],
    },
  },
  theme: {
    extend: {
      fontFamily: {
        mono: [
          'monospace',
        ],
      },
      lineHeight: {
        normal: '1.6',
        loose: '1.75',
      },
      maxWidth: {
        none: 'none',
        '7xl': '80rem',
        '8xl': '88rem'
      },
      spacing: {
        '7': '1.75rem',
        '9': '2.25rem'
      },
      boxShadow: {
        'lg': '0 -1px 27px 0 rgba(0, 0, 0, 0.04), 0 4px 15px 0 rgba(0, 0, 0, 0.08)',
      },
      height: {
        '112': '28rem',
        '136': '34rem'
      }
    },
    colors: {
      white: '#FFF',
      black: '#000',
      transparent: 'transparent',
      indigo: {
        50: '#E0E8F9',
        100: '#BED0F7',
        200: '#98AEEB',
        300: '#7B93DB',
        400: '#647ACB',
        500: '#4C63B6',
        600: '#4055A8',
        700: '#35469C',
        800: '#2D3A8C',
        900: '#19216C',
      },
      cyan: {
        50: '#E1FCF8',
        100: '#C1FEF6',
        200: '#92FDF2',
        300: '#62F4EB',
        400: '#3AE7E1',
        500: '#1CD4D4',
        600: '#0FB5BA',
        700: '#099AA4',
        800: '#07818F',
        900: '#05606E',
      },
      grey: {
        50: '#F5F7FA',
        100: '#E4E7EB',
        200: '#CBD2D9',
        300: '#9AA5B1',
        400: '#7B8794',
        500: '#616E7C',
        600: '#52606D',
        700: '#3E4C59',
        800: '#323F4B',
        900: '#1F2933',
      },
      pink: {
        50: '#FFE3EC',
        100: '#FFB8D2',
        200: '#FF8CBA',
        300: '#F364A2',
        400: '#E8368F',
        500: '#DA127D',
        600: '#BC0A6F',
        700: '#A30664',
        800: '#870557',
        900: '#620042',
      },
      red: {
        50: '#FFE3E3',
        100: '#FFBDBD',
        200: '#FF9B9B',
        300: '#F86A6A',
        400: '#EF4E4E',
        500: '#E12D39',
        600: '#CF1124',
        700: '#AB091E',
        800: '#8A041A',
        900: '#610316',
      },
      yellow: {
        50: '#FFFBEA',
        100: '#FFF3C4',
        200: '#FCE588',
        300: '#FADB5F',
        400: '#F7C948',
        500: '#F0B429',
        600: '#DE911D',
        700: '#CB6E17',
        800: '#B44D12',
        900: '#8D2B0B',
      },
      green: {
        50: '#E3F9E5',
        100: '#C1F2C7',
        200: '#91E697',
        300: '#51CA58',
        400: '#31B237',
        500: '#18981D',
        600: '#0F8613',
        700: '#0E7817',
        800: '#07600E',
        900: '#014807',
      }
    },
    fontSize: {
      '2xs': '.7rem',
      'xs': '.8rem',
      'sm': '.925rem',
      'base': '1rem',
      'lg': '1.125rem',
      'xl': '1.25rem',
      '2xl': '1.5rem',
      '3xl': '1.75rem',
      '4xl': '2.125rem',
      '5xl': '2.625rem',
      '6xl': '10rem',
    },
    container: {
      center: true,
      padding: '1.5rem',
    },
  },
  variants: {
    borderRadius: ['responsive', 'focus'],
    borderWidth: ['responsive', 'active', 'focus'],
    width: ['responsive', 'focus']
  },
  plugins: [
    function({ addUtilities }) {
      const newUtilities = {
        '.transition-fast': {
          transition: 'all .2s ease-out',
        },
        '.transition': {
          transition: 'all .5s ease-out',
        },
      }
      addUtilities(newUtilities)
    },
  ]
}
