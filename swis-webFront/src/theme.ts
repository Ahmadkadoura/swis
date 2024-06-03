import { extendTheme, ThemeConfig } from "@chakra-ui/react";

const config: ThemeConfig = {
  initialColorMode: "light",
  useSystemColorMode: false,
};
const theme = extendTheme({
  config,
  color:{
    gray: {
      50: '#f9f9f9',
      100: '#ededed',
      200: '#d3d3d3',
      300: '#b3b3b3',
      400: '#a0a0a0',
      500: '#898989',
      600: '#333333',
      700: '#202020',
      800: '#121212',
      900: '#111'
    }
  },
  fonts: {
    arText: "ae",
    enText: "En"
  },
});

export default theme;
