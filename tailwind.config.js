module.exports = {
    mode: 'jit',
    purge: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    darkMode: false, // or 'media' or 'class'
    theme: {
        backgroundColor: theme => ({
            ...theme('colors'),
            'whitesmoke': '#f5f5f5',
            'primary': '#3490dc',
            'secondary': '#ffed4a',
            'danger': '#e3342f',
            'kou': {
                'light': '#08c547',
                'normal': '#009933',
                'dark' : '#047c2c'
            },
        })
    },
    variants: {
        extend: {},
    },
    plugins: [],
}
