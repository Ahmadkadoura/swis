import {
  Box,
  Button,
  FormControl,
  FormLabel,
  Input,
  InputGroup,
  InputLeftElement,
  InputRightElement,
  Text,
} from "@chakra-ui/react";
import { ErrorMessage, Field, Form, Formik } from "formik";
import * as yup from "yup";
import User from "../../entities/User";
import useLogin from "../../hooks/useLogin";
import { MdOutlineMail, MdLockOutline, MdVisibilityOff, MdVisibility } from "react-icons/md";
import { useState } from "react";

interface Props{
  width : number;
}

export const LoginForm = ({width} : Props) => {
  const Login = useLogin();
  const [showPassword, setShowPassword] = useState(false);
  const toggleShowPassword = () => setShowPassword(!showPassword);
  const handleLogin = (values: User) => {
    Login.mutate({
      email: values.email,
      password: values.password,
    });
  };
  const FieldWidthL = Math.floor((32/100) * width) + "vw";
  const FieldWidthB = Math.floor((77/100) * width) + "vw";
  const validationsLogin = yup.object().shape({
    email: yup
      .string()
      .email("Must be a valid email")
      .required("Email is required"),
    password: yup
      .string()
      .min(8, "Password must be at least 8 characters")
      .required("Password is required"),
  });

  return (
    <Formik
      initialValues={{ email: "", password: "" }}
      onSubmit={handleLogin}
      validationSchema={validationsLogin}
    >
      <Form>
        {Login.error && (
          <Text color="red.700">Check Your Email or Password</Text>
        )}
        <Box paddingTop={'50px'}>
          <FormControl id="email">
            <FormLabel fontFamily={"cursive"}>Email</FormLabel>
            <InputGroup>
              <InputLeftElement
                
                pointerEvents="none"
                children={<MdOutlineMail color="black" />}
              />
              <Field
                name="email"
                as={Input}
                type="email"
                placeholder="Email"
                _placeholder={{ color: "gray.700" }}
                borderRadius={'20'}
                width={{base:FieldWidthB , lg : FieldWidthL}}
                pl={'30px'}
              />
            </InputGroup>
            <ErrorMessage name="email">
              {(msg) => <Text color="red.500">{msg}</Text>}
            </ErrorMessage>
          </FormControl>
          <FormControl id="password" marginTop={5}>
            <FormLabel fontFamily={"cursive"}>Password</FormLabel>
            <InputGroup >
              <InputLeftElement
                pointerEvents="none"
                children={<MdLockOutline color="black" />}
              />
              <Field
                name="password"
                as={Input}
                type={showPassword ? 'text' : 'password'}
                placeholder="Password"
                _placeholder={{ color: "gray.700" }}
                borderRadius={'20'}
                width={{base:FieldWidthB , lg : FieldWidthL}}
                pl={'30px'}
              />
              <InputRightElement width="4.5rem" >
                <Button h="1.75rem" size="sm" onClick={toggleShowPassword} bgColor={'gray.400'} >
                  {showPassword ? <MdVisibilityOff /> : <MdVisibility />}
                </Button>
              </InputRightElement>
            </InputGroup>
            <ErrorMessage name="password">
              {(msg) => <Text color="red.500">{msg}</Text>}
            </ErrorMessage>
          </FormControl>
          <Button
            bgColor={'red.600'}
            color={'white'}
            width="full"
            type="submit"
            marginTop={5}
            borderRadius={"20"}
          >
            Login
          </Button>
        </Box>
      </Form>
    </Formik>
  );
};