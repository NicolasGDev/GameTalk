export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            backgroundImage: {
                "hero-section": "url('/public/images/hero4.jpg')",
            },

            colors: {
                main: "#09FFAE",
                mainClaro: "#6ff2c7",
            },
        },
    },
    plugins: [],
};
