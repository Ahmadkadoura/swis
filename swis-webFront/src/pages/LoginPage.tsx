import { Box, HStack, Text, VStack } from "@chakra-ui/react";
import im from "../assets/results.jpg";
import { LoginForm } from "../components/LoginForm";
import { Logo } from "../components/Logo";

export const LoginPage = () => {
  const innerBoxHeight = "90vh";
  const innerBoxWidth = 80;
  const innerBoxImageWidth = (60/100) * innerBoxWidth;
  const loginFormWidth = (40/100) * innerBoxWidth;
  return (
    <Box
      bgGradient="linear(to-tr,red.600, red.700)"
      w="100%"
      height={"100vh"}
      p={8}
      color="white"
    >
      <Box bg="white" w={innerBoxWidth + 'vw'} height={innerBoxHeight} m="auto" borderRadius={"20"}>
        <HStack spacing={0}>
          <Box
            w={{ md: "0%", lg:innerBoxImageWidth + "vw"}}
            h={innerBoxHeight}
            bgImage={im}
            bgSize={"cover"}
            bgPosition={"center"}
            position={"relative"}
            borderLeftRadius={20}
          >
            <Box
              position="absolute"
              top="0"
              left="0"
              w={"100px"}
              h={"100px"}
              borderRadius="full"
              bg="rgba(255, 255, 255, 0.5)"
              display="flex"
              justifyContent="center"
              alignItems="center"
              overflow="hidden"
            >
              <Logo />
            </Box>
          </Box>
          <VStack
            w={{ base: "100%", lg: loginFormWidth  + "vw"}} 
            h={innerBoxHeight}
            py="20px"
            backgroundColor="gray.400"
            borderRightRadius={20}
            spacing={4}
            justifyContent={{base:"center" , lg: "none"}}
          >
            <Text
              color={"gray.800"}
              fontSize={{ base: "4xl", lg: "5xl" }}
              paddingTop={"50px"}
            >
              Welcome!
            </Text>
            <LoginForm width={innerBoxWidth}/>
          </VStack>
        </HStack>
      </Box>
    </Box>
  );
};
