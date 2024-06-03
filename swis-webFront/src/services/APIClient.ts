import axios, { AxiosRequestConfig } from "axios";
const axiosInstance = axios.create({
  baseURL: "http://127.0.0.1:8000/api",
});

class APIClient<T> {
  endPoint: string;

  constructor(endPoint: string) {
    this.endPoint = endPoint;
  }
  getAll = (config: AxiosRequestConfig) => {
    return axiosInstance
      .get<T>(this.endPoint, config)
      .then((res) => res.data);
  };
  post = (data: T) => {
    return axiosInstance.post<T>(this.endPoint, data).then((res) => res.data);
  };
  get = (id: number | string) => {
    return axiosInstance
      .get<T>(this.endPoint + "/" + id)
      .then((res) => res.data);
  };
}

export default APIClient;
