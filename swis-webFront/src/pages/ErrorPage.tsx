import { Box, Grid, GridItem, Heading, Text } from "@chakra-ui/react";
import { isRouteErrorResponse, useRouteError } from "react-router-dom";
import { NavBar } from "../components/Layout/NavBar";
import { SideBar } from "../components/Layout/SideBar";

export const ErrorPage = () => {
  const error = useRouteError();
  return (
    <Grid
      templateAreas={{
        base: `"nav" "main"`,
        lg: `"nav nav" 
        "aside main"`,
      }}
    >
      <GridItem area={"nav"}>
        <NavBar />
      </GridItem>
      <GridItem area={"aside"}>
        <SideBar />
      </GridItem>
      <GridItem area={"main"}>
        <Box padding={5}>
          <Heading>Oops</Heading>
          <Text>
            {isRouteErrorResponse(error)
              ? "This page does not exist"
              : "An unexpected error occurred"}
          </Text>
        </Box>
      </GridItem>
    </Grid>
  );
};
