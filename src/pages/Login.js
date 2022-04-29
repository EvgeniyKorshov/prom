import { Button, TextField } from "@mui/material";
import { useState } from "react";
import { useLocation, useNavigate } from "react-router-dom";
import { toast, ToastContainer } from "react-toastify";
import { useAuth } from '../hooks/AuthProvider';

const Login = () =>{

    let navigate = useNavigate();
    let location = useLocation();
    const auth = useAuth();

    const [email,setEmail]=useState('');
    const [password,setPassword]=useState('');
    const [error,setError]=useState('');

    let from = location.from?.state?.pathname || '/';

    const handleEmail = (e) =>{
        setEmail(e.target.value);
    }
    const handlePassword = (e) =>{
        setPassword(e.target.value);
    }
    const handleSubmit = async (e) =>{
        e.preventDefault();
        setError('');

        try{
            await auth.signin({email,password},()=>{
            setTimeout(()=>navigate(from,{replace:true}),1000)

            toast.success('You are logged in!',{position: toast.POSITION.BOTTOM_RIGHT});
            });
        }catch(e){
            toast.error('Error');
            setError('');
            console.error(e)
            toast.error('This is an error!',{position: toast.POSITION.BOTTOM_RIGHT});
        }
    }
    return (
    <div>
        <ToastContainer/>
        <form onSubmit={handleSubmit}>
            <p>Login</p>
            <p>Enter your email and password for authorization</p>

            <p>email:</p>
            <TextField
            placeholder="Enter email"
            name="email"
            type="email"
            value={email}
            onChange={handleEmail}
            />

            <p>password:</p>
            <TextField
            placeholder="Enter password"
            name="password"
            type="password"
            value={password}
            onChange={handlePassword}
            />

            <div>
            {error && <p>{error}</p>}
            <Button variant="contained" size="medium" type="submit" >Enter data</Button>
            </div>
        </form>
    </div>)
}

export default Login;