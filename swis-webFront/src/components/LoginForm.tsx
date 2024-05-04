import {
  Box,
  Button,
  FormControl,
  FormLabel,
  Input,
  Text,
} from "@chakra-ui/react";
import { ErrorMessage, Field, Form, Formik } from "formik";
import * as yup from "yup";
import User from "../entities/User";
import useUserStore from "../stores/userStore";

export const LoginForm = () => {
  const setEmail = useUserStore((s) => s.setEmail);
  const setPassword = useUserStore((s) => s.setPassword);
  const handleLogin = (values: User) => {
    setEmail(values.email!);
    setPassword(values.password!);
  };
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
        <Box >
          <FormControl id="email">
            <FormLabel fontFamily={"cursive"}>Email</FormLabel>
            <Box bgColor={"white"} borderRadius={"20"}>
              <Field
                name="email"
                as={Input}
                type="email"
                placeholder="Email"
                _placeholder={{ color: "gray.700" }}
                width={300}
              />
            </Box>
            <ErrorMessage name="email">
              {(msg) => <Text color="red.500">{msg}</Text>}
            </ErrorMessage>
          </FormControl>
          <FormControl id="password">
            <FormLabel fontFamily={"cursive"} marginTop={5}>
              Password
            </FormLabel>
            <Box bgColor={"white"} borderRadius={"20"}>
            <Field
              name="password"
              as={Input}
              type="password"
              placeholder="Password"
              _placeholder={{ color: "gray.700" }}
              width={300}
            />
            </Box>
            <ErrorMessage name="password">
              {(msg) => <Text color="red.500">{msg}</Text>}
            </ErrorMessage>
          </FormControl>
          <Button
            colorScheme="red"
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
