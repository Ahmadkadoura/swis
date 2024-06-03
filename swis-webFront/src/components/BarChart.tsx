import { Box, HStack, useColorModeValue } from "@chakra-ui/react";
import {
  BarElement,
  CategoryScale,
  Chart as ChartJS,
  Legend,
  LinearScale,
  Title,
  Tooltip,
} from "chart.js";
import { Bar } from "react-chartjs-2";

ChartJS.register(
  CategoryScale,
  LinearScale,
  BarElement,
  Title,
  Tooltip,
  Legend
);
  const BarChart = () => {
    const bgColor = useColorModeValue('white', 'gray.600');
    const borderColor = useColorModeValue('gray.200', 'gray.700');
    const data = {
      labels: ["Imports" , "Exports"],
      datasets: [
        {
          label: "Statistics",
          data: [12 , 20], 
          backgroundColor: ["rgba(100, 200, 255, 0.2)" , "rgba(30,30,255,0.2)"],
          borderColor: ["rgba(100, 200, 255, 0.2)" , "rgba(30,30,255,0.2)"],
          borderWidth: 1,
          barThickness: 75,
        
        },
      ],
    };
    const options = {
      responsive: true,
      scales: {
        y: {
          beginAtZero: true,  
        },
      },
      maintainAspectRatio: false,
      plugins: {
        title:{
          display: true,
          text: "simasd",
        },
        legend: {
          display: false,
        }
      }
    };
  
    return (
      <HStack  bgColor={bgColor} borderColor={borderColor}>
        <Box
          height={{ base: "300px", lg: "625px" }}
          width={{ base: "100%", lg: "700px" }}
        >
          <Bar data={data} options={options} />
        </Box>
  
        <Box
          height={{ base: "300px", lg: "625px" }}
          width={{ base: "100%", lg: "700px" }}
        >
          <Bar data={data} options={options} />
        </Box>
      </HStack>
    );
  };
  
  export default BarChart;
  