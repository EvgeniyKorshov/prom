import {Link, useParams } from 'react-router-dom';
import { Button,List,Dialog,DialogTitle,TextField,ListItem,ListItemAvatar,ListItemText,Avatar,IconButton } from '@mui/material';
import DeleteIcon from '@mui/icons-material/Delete';
import FolderIcon from '@mui/icons-material/Folder';
import {useDispatch, useSelector} from 'react-redux';
import { useEffect, useState } from 'react';
//import { addChat } from '../store/chats/actions';
import {initTrackerWithFB,addChatWithFB, deleteChatWithFB} from '../middlewares/middleware';

const ChatList = () =>{

  const chats = useSelector(state=>state.chats.chatList)
  const [visible,setVisible] = useState(false);
  const [chatName,setChatName] = useState('');
  const dispatch = useDispatch();
  const {chatId} = useParams();

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
    dispatch(addChatWithFB(chatName));
    setChatName('');
    handleClose();
  }

  const deleteChat = (id)=>{
    dispatch(deleteChatWithFB(id));
  }

  useEffect(()=>{dispatch(initTrackerWithFB())},[chatId]);
  
    return (<div>

            <List >
      {chats.map((chat)=>(
        <div><Link to={`/chats/${chat.id}`} key={chat.id}>
        
        <ListItem
                  secondaryAction={
                    <IconButton edge="end" aria-label="delete" onClick={()=>deleteChat(chat.id)}>
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
    
    <Button onClick={handleAdd} variant="contained" size="medium" >Add chat</Button>
        <Dialog open={visible} onClose={handleClose}>
          <DialogTitle>Enter a name</DialogTitle>
          <TextField
          placeholder='chat name'
          value={chatName}
          onChange={handleChatName}
          />
          <Button onClick={handleSave} variant="contained" size="medium" >save chat</Button>
        </Dialog>
    </div>)
}

export default ChatList;