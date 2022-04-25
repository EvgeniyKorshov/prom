  import {
    Routes,
    Route,
    Link
  } from "react-router-dom";
  import Home from './Home';
  import Profile from './Profile';
  import Chats from '../components/Chats';
  import Gists from './Gists';
  import Login from './Login';
  import Registration from './Registration';
  import React from 'react';
  import RequireAuth from '../hocs/RequireAuth';

const Router = () => {

    return (
    <>
    <ul>
        <li><Link to='/'>Home</Link></li>
        <li><Link to='/profile'>Profile</Link></li>
        <li><Link to='/chats'>Chats</Link></li>
        <li><Link to='/gists'>Gists</Link></li>
        <li><Link to='/login'>Login</Link></li>
        <li><Link to='/registration'>Registration</Link></li>
    </ul>
    <Routes>
    

      <Route element={<RequireAuth />}>
          <Route path="/" element={<Home />}/>
          <Route path="/profile" element={<Profile/>}/>
          <Route path="/gists" element={<Gists/>}/>
          <Route path="/chats/:chatId" element={<Chats/>}/>
          <Route path="*" element={<Chats/>}/>
      </Route>

    
      
       
        <Route path="/login" element={<Login/>}/>
        <Route path="/registration" element={<Registration/>}/>
        
    </Routes>
    </>
    );
};
export default Router;
