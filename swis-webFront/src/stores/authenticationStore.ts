import { create } from "zustand";



interface Authentication{
    isAuthenticated : boolean;
    setAuthentication : () => void;
}

const useAuthentication = create<Authentication>((set) => ({
isAuthenticated : false,
setAuthentication : () => set((store) => ({isAuthenticated : !store.isAuthenticated})),
}));

export default useAuthentication;