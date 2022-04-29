import { Link } from "react-router-dom";
import { useState } from "react";
import {Button,TextField} from '@mui/material';
import firebaseConfig from '../services/firebaseConfig'
import {getAuth,createUserWithEmailAndPassword} from 'firebase/auth';
import { ToastContainer, toast } from 'react-toastify';
import 'react-toastify/dist/ReactToastify.css';

const Registration = () =>{

    const [email,setEmail] = useState('');
    const [password,setPassword] = useState('');
    const [error,setError] = useState('');

    const handleChangeEmail = (e) =>{
        setEmail(e.target.value);
    }
    const handleChangePassword = (e) =>{
        setPassword(e.target.value);
    }



    const onSubmit = async (e) =>{
        e.preventDefault();
        try{
            const auth = getAuth(firebaseConfig);
            await createUserWithEmailAndPassword(auth,email,password)
            
            toast.success('Registration was successful!',{position: toast.POSITION.BOTTOM_RIGHT});
            setEmail('');
            setPassword('');
        }catch(e){
            console.error(e);
            toast.error('This is an error!',{position: toast.POSITION.BOTTOM_RIGHT});
        }
    }
    return (<>
    <div>
        <ToastContainer />
        <form onSubmit={onSubmit}>

            <p>Registration</p>
            <p>email:</p>

            <TextField
            placeholder="Enter email"
            name="email"
            type="email"
            onChange={handleChangeEmail}
            value={email}
            required
            />
              
            <p>password:</p>

            <TextField
            placeholder="Enter password"
            name="password"
            type="password"
            onChange={handleChangePassword}
            value={password}
            required
            />

            <div>
            {error && <p>{error}</p>}
            <Button type="submit" variant="contained" size="medium" >Registration</Button>
            </div>
          
            <p>do you already have an account?</p>
            <Link to="login">Enter</Link>
       </form>
    </div></>)
}

export default Registration;