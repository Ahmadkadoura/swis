import { Grid, GridItem } from "@chakra-ui/react";
import { Outlet } from "react-router-dom";
import { NavBar } from "../components/Layout/NavBar";
import { SideBar } from "../components/Layout/SideBar";


export const Layout = () => {
  return (
    <Grid
      templateAreas={{
        base: `"nav"
               "main"`,
        lg: `"nav nav"
             "aside main"`,
      }}
      templateRows={{ lg: 'auto 1fr' }}
      templateColumns={{ lg: 'auto 1fr' }}
      h="100vh" // Set the height of the grid to be 100% of the viewport height
    >
      <GridItem
        area={"nav"}
        position="sticky" // or "fixed" if you want it to be always at the same spot
        top="0" // Stick to the top
        zIndex="sticky" // Ensure it's above other content
        width="full" // Ensure it spans the full width
      >
        <NavBar />
      </GridItem>
      <GridItem
        area={"aside"}
        position="sticky" // or "fixed" for sidebar
        top="0" // Stick to the top, adjust if NavBar has height
        zIndex="sticky" // Ensure it's above other content
      >
        <SideBar />
      </GridItem>
      <GridItem area={"main"} overflowY="auto">
        <Outlet />
      </GridItem>
    </Grid>
  );
};
