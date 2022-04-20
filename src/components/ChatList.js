import {Link } from 'react-router-dom';
import { List,Dialog,DialogTitle,TextField,ListItem,ListItemAvatar,ListItemText,Avatar,IconButton } from '@mui/material';
import DeleteIcon from '@mui/icons-material/Delete';
import FolderIcon from '@mui/icons-material/Folder';
import {useDispatch, useSelector} from 'react-redux';
import { useState } from 'react';
import { addChat } from '../store/chats/actions';

const ChatList = () =>{

  const chats = useSelector(state=>state.chats.chatList)
  const [visible,setVisible] = useState(false);
  const [chatName,setChatName] = useState('');
  const dispatch = useDispatch();

  const handleChatName= (e)=>{
    setChatName(e.target.value);
  }
  const handleClose=()=>{
    setVisible(false)
  }

  const handleAdd = ()=>{
    setVisible(true);
  }
  const handleSave = ()=>{
    dispatch(addChat(chatName));
    setChatName('');
    handleClose();
  }
    return (<div>

            <List >
      {chats.map((chat)=>(
        <div><Link to={`/chats/${chat.id}`} key={chat.id}>
        
        <ListItem
                  secondaryAction={
                    <IconButton edge="end" aria-label="delete">
                      <DeleteIcon />
                    </IconButton>
                  }
                >
                  <ListItemAvatar>
                  <Avatar>
                      <FolderIcon />
                    </Avatar>
                  </ListItemAvatar>
                  <ListItemText
                    primary={chat.name}
                  
                  />
                </ListItem>
        </Link>
        
        
        </div>
          
            
              
           
          
         

        
    ))} </List>
    
    <button onClick={handleAdd}>добавить чат</button>
        <Dialog open={visible} onClose={handleClose}>
          <DialogTitle>введите имя чата</DialogTitle>
          <TextField
          placeholder='chat name'
          value={chatName}
          onChange={handleChatName}
          />
          <button onClick={handleSave}>save chat</button>
        </Dialog>
    </div>)
}

export default ChatList;