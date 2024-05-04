import { Image } from "@chakra-ui/react";
import img from "../assets/SwisTeam.jpg";
export const ImageComponent = () => {
  return (
    <Image
      src={img}
      alt="Background"
      objectFit="cover"
      width="100%"
      height="100%"
    />
  );
};
