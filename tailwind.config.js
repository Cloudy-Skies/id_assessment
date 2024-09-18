/** @type {import('tailwindcss').Config} */
module.exports = {
  mode: "jit",
  content: ["*/*.{html,js,php}"],
  darkMode: 'class',
  theme: {
    screens: { md: { max: "1050px" }, sm: { max: "550px" } },
    fontFamily: {
      poppins: "Popppins",
      ubuntu: "Ubuntu",
      inter: "Inter",
      roboto: "Roboto",
    },
    extend: {
      colors: {
        black: { 900: "var(--black-900)" },
        blue_gray: {
          100: "var(--blue_gray_100)",
          300: "var(--blue_gray_300)",
          400: "var(--blue_gray_400)",
          700: "var(--blue_gray_700)",
        },
        deep_purple: { a100: "var(--deep_purple_a100)" },
        gray: { 100: "var(--gray_100)", 500: "var(--gray_500)", 700: "var(--gray_700)", 900: "var(--gray_900)" },
        light_green: { 700: "var(--light_green_700)" },
        red: { 400: "var(--red_400)", 500: "var(--red_500)", "500_01": "var(--red_500_01)" },
        white: { a700: "var(--white_a700)" },
      },
      boxShadow: {},
    },
  },
  plugins: [require('@tailwindcss/forms')],
};
