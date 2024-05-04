import { create } from "zustand";
import User from "../entities/User";

interface UserStore{
    user : User;
    setName : (name : string) => void;
    setPhone : (phone : string) => void;
    setPassword : (password : string) => void;
    setEmail : (email : string) => void;
    setCode : (code : string) => void;
    setType : (type : string) => void;
} 

const useUserStore = create<UserStore>((set) => ({
user : {},
setName : (name) => set((store) => ({user : {...store.user , name}})),
setPhone : (phone) => set((store) => ({user : {...store.user , phone}})),
setPassword: (password) => set((store) => ({user : {...store.user, password}})),
setEmail: (email) => set((store) => ({user : {...store.user , email}})),
setCode: (code) => set((store) => ({user : {...store.user , code}})),
setType : (type) => set((store) => ({user : {...store.user , type}}))
}));

export default useUserStore;