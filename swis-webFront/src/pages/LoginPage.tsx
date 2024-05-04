import { Box, HStack, Image, Text, VStack } from "@chakra-ui/react";
import crescent from "../assets/Crescent.png";
import { LoginForm } from "../components/LoginForm";
import { ImageComponent } from "../components/imageComponent";
import Fonts from "../Fonts";
export const LoginPage = () => {
  return (
    <Box position="relative" width="100vw" height="100vh">
      <ImageComponent />
      <VStack
        paddingY="20px"
        position="absolute"
        top="50%"
        left="50%"
        transform="translate(-50%, -50%)"
        spacing="4"
        width={380}
        height={380}
        borderRadius={"5%"}
        backgroundColor={"gray.500"}
      >
        <HStack>
          <Box>
            <Fonts />
            <Text
              fontFamily="arText"
              fontSize={19}
              fontWeight={"bold"}
              textAlign={"end"}
            >
              منظمة الهلال الاحمر العربي السوري
            </Text>

            <Text
              fontFamily={"enText"}
              fontWeight={"bold"}
              fontSize={19}
              textAlign={"end"}
            >
              SYRIAN ARAB RED CRESCENT
            </Text>
          </Box>
          <Image
            src={crescent}
            alt="crescent"
            objectFit="fill"
            boxSize={"80px"}
          />
        </HStack>
        <LoginForm />
      </VStack>
    </Box>
  );
};
