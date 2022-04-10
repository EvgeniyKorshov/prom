  import {
    Routes,
    Route,
    Link
  } from "react-router-dom";
  import Home from './Home';
  import Profile from './Profile';
  import Chats from './Chats';
  import React,{useState} from 'react';
  import { AUTHOR } from './common';
  const initialChats = {
    id1:{
        name:'chat 1',
        messages:[
            {text:'Message 1',author:AUTHOR.bot},
            {text:'Hi',author:AUTHOR.me}
        ]
    },
    id2:{
        name:'chat 2',
        messages:[{text:'Message from chat 2',author:AUTHOR.me}]
    }
}

const Router = () => {
  const [chats] = useState(initialChats);

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
          <Route path="/chats/:chatId" element={<Chats chats={chats}/>} />
        <Route path="*" element={<Chats chats={chats}/>} />
    </Routes>
    </>
    );
};
export default Router;