import { Box, FormControl, Input, InputGroup, InputLeftElement } from "@chakra-ui/react"
import { BsSearch } from "react-icons/bs";
import { Field, Form, Formik } from "formik"
interface Search{
    text : string;
}
export const SearchInput = () => {
    const handleSearch = (vlaues : Search) => {
        
    }
  return (
    <Formik
    initialValues={{text : ''}}
    onSubmit={handleSearch}
    >
        <Form>
            <Box bgColor={'gray'} borderRadius={20}>
                <FormControl id="text">
                    <InputGroup>
                    <InputLeftElement children={<BsSearch />} />
                    <Field
                    name="text"
                    as={Input}
                    borderRadius={20}
                    width="1100px"
                    placeholder="Search about your product"
                    _placeholder={{ color: "gray.700" }}
                    pl={10}
                    >
                    </Field>
                    </InputGroup>
                </FormControl>
            </Box>
        </Form>
    </Formik>

    
  )
}
