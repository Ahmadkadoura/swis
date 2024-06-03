import { useMutation } from "@tanstack/react-query";
import User from "../entities/User";
import axios from "axios";
import { useNavigate } from "react-router-dom";
import useUserStore from "../stores/userStore";
import Response from "../entities/GlobalResponse";
const useLogin = () => {
  const navigate = useNavigate();
  const setUser = useUserStore((s) => s.setUser);
  return useMutation<Response<User>, Error, User>({
    mutationFn: (user) =>
      axios
        .post<Response<User>>("http://127.0.0.1:8000/api/login", user)
        .then((res) => {
          
          // save the token so that you can use any request after logging in
          axios.defaults.headers.common[
            "Authorization"
          ] = `Bearer ${res.data.data.token}`;

          // save the data of the current user
          setUser(res.data.data);

          return res.data;
        }),
    onSuccess: (data, variable) => {
      console.log(data, variable);
      navigate("/Home");
    },
  });
};

export default useLogin;
