import { Box, Button, Divider, Icon, List, ListItem } from "@chakra-ui/react";
import {
    FaBoxOpen,
    FaChartLine,
    FaCodeBranch,
    FaExchangeAlt,
    FaHandHoldingHeart,
    FaTruck,
    FaUsers,
    FaWarehouse,
    FaHome
} from "react-icons/fa";
import { IconType } from "react-icons/lib";
import { Link } from "react-router-dom";
import Mycolor from "../../constants";
export const SideBar = () => {
  const Tabs: Record<string, IconType> = {
    Home:FaHome,
    Branches: FaCodeBranch,
    Warehouses: FaWarehouse,
    Users: FaUsers,
    Drivers: FaTruck,
    Donor: FaHandHoldingHeart,
    Products: FaBoxOpen,
    Transactions: FaExchangeAlt,
    Reports: FaChartLine,
  };
  return (
    <List bgColor={Mycolor} w={"200px"} color={"white"}>
      <Divider />
      {Object.entries(Tabs).map(([name, icon], index) => (
        <Box
          key={index}
          borderBottom="1px"
          borderColor="gray.200"
          pb={3}
          _last={{ borderBottom: "none" }}
          _hover={{bg:'red.500',
          '.icon-hover': {
            transform: 'scale(1.5)', 
            transition: 'transform 0.3s ease-in-out',
          }
          }}
        >
          <ListItem textAlign={'center'} py={4}>
            <Link to={`/${name}`}>
              <Icon as={icon} mr={2} className="icon-hover"/>
              <Button fontSize={"large"} variant={"link"} color={"white"}>
                {name}
              </Button>
            </Link>
          </ListItem>
        </Box>
      ))}
    </List>
  );
};
