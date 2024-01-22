/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/**/*.blade.php",
        "./resources/**/*.js",
    ],
    theme: {
        extend: {
            maxWidth: {
                '7/12': '52%',
            },
        },
    },
    plugins: [],
}
