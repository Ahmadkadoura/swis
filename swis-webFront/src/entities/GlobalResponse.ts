
export default interface Response<T> {
    status: string;
    data: T;
    message: string;
  }

  export interface GetAllResponse<T>{
    status : string;
    data : T[];
    message: string;
  }