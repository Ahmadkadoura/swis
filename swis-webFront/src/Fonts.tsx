import { Global } from "@emotion/react";

const Fonts = () => (
  <Global
    styles={`
    @font-face {
      font-family: 'ae';
      src: url('/src/assets/ae_Sharjah Regular.ttf') format('truetype');
    }
    @font-face {
        font-family: 'En';
        src: url('/src/assets/Akshar-VariableFont_wght.ttf') format('truetype');
      }
  `}
  />
);
export default Fonts;