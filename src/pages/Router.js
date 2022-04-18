  import {
    Routes,
    Route,
    Link
  } from "react-router-dom";
  import Home from '../pages/Home';
  import Profile from '../pages/Profile';
  import Chats from '../components/Chats';
  import React from 'react';
 
const Router = () => {

    return (
    <>
    <ul>
        <li><Link to='/'>Home</Link></li>
        <li><Link to='/profile'>Profile</Link></li>
        <li><Link to='/chats'>Chats</Link></li>
    </ul>
    <Routes>
      <Route path="/" element={<Home />}/>
        <Route path="/profile" element={<Profile />}/>
          <Route path="/chats/:chatId" element={<Chats/>} />
        <Route path="*" element={<Chats/>} />
    </Routes>
    </>
    );
};
export default Router;