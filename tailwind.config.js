const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: ['./storage/framework/views/*.php', './resources/views/**/*.blade.php'],

    darkMode: 'class',

    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter var', ...defaultTheme.fontFamily.sans],
                mono: ['Ubuntu Mono', 'monospace'],
            },

            typography: (theme) => ({
                light: {
                    css: [
                        {
                            color: theme('colors.gray.400'),
                            '[class~="lead"]': {
                                color: theme('colors.gray.300'),
                            },
                            a: {
                                color: theme('colors.gray.300'),
                            },
                            strong: {
                                color: theme('colors.gray.300'),
                            },
                            'ol > li::before': {
                                color: theme('colors.gray.400'),
                            },
                            'ul > li::before': {
                                backgroundColor: theme('colors.gray.600'),
                            },
                            hr: {
                                borderColor: theme('colors.gray.200'),
                            },
                            blockquote: {
                                color: theme('colors.gray.200'),
                                borderLeftColor: theme('colors.gray.600'),
                            },
                            h1: {
                                color: theme('colors.gray.300'),
                            },
                            h2: {
                                color: theme('colors.gray.300'),
                            },
                            h3: {
                                color: theme('colors.gray.300'),
                            },
                            h4: {
                                color: theme('colors.gray.300'),
                            },
                            'figure figcaption': {
                                color: theme('colors.gray.400'),
                            },
                            code: {
                                color: theme('colors.gray.300'),
                            },
                            'a code': {
                                color: theme('colors.gray.300'),
                            },
                            pre: {
                                color: theme('colors.gray.200'),
                                backgroundColor: theme('colors.gray.800'),
                            },
                            thead: {
                                color: theme('colors.gray.300'),
                                borderBottomColor: theme('colors.gray.400'),
                            },
                            'tbody tr': {
                                borderBottomColor: theme('colors.gray.600'),
                            },
                        },
                    ],
                },
            }),
        },
    },

        variants: {
            extend: {
                opacity: ['disabled'],
                typography: ['dark'],
            },
        },

        plugins: [
            require('@tailwindcss/typography')
        ],
    }