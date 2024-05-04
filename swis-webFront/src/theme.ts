import { extendTheme, ThemeConfig } from "@chakra-ui/react";

const config: ThemeConfig = {
  initialColorMode: "light",
  
};
const theme = extendTheme({
  config,
  fonts: {
    arText: "ae",
    enText: "En"
  },
});

export default theme;
