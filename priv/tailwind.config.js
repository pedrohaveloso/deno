/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./../public/**/*.{php,phtml,html,js}",
    "./../templates/**/*.{php,phtml,html,js}",
    "./../app/Web/Paginator.php",
  ],
  theme: {
    extend: {
      keyframes: {
        "modal-fade-in": {
          "0%": { display: "none", transform: "scale(0)" },
          "100%": { display: "block", transform: "scale(1)" },
        },
        "modal-backdrop-fade-in": {
          "0%": { opacity: "0" },
          "100%": { opacity: "1" },
        },
        "modal-fade-out": {
          "0%": { display: "block", transform: "scale(1)" },
          "100%": { display: "none", transform: "scale(0)" },
        },
        "modal-backdrop-fade-out": {
          "0%": { opacity: "1" },
          "100%": { opacity: "0" },
        },
      },
      animation: {
        "modal-fade-in": "modal-fade-in 0.4s ease-out",
        "modal-backdrop-fade-in":
          "modal-backdrop-fade-in 0.4s ease-out backwards",

        "modal-fade-out": "modal-fade-out 0.4s ease-out",
        "modal-backdrop-fade-out":
          "modal-backdrop-fade-out 0.4s ease-out forwards",
      },
    },
  },
  plugins: [],
};
