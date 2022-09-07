/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./resources/**/*.{blade.php,ts,tsx,js,jsx,vue}"],
    theme: {
        extend: {},
    },
    plugins: [require("@tailwindcss/forms")],
};
