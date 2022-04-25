import { useParams} from 'react-router-dom';
import React,{useEffect} from 'react';
import { List,ListItem,Divider,ListItemText,ListItemAvatar,Avatar,Typography} from '@mui/material';
import { AUTHOR } from '../constants/common';
import {useDispatch, useSelector} from 'react-redux';
import  {getMessagesByChatIdWithFB}  from '../middlewares/middleware';

const MessageList = () =>{
    const allMessages = useSelector(state =>state.messages.messageList);
    const {name} = useSelector((state)=> state.profile)
    let { chatId } = useParams();
    const dispatch = useDispatch();
 
    const messages = allMessages[chatId];
       
  useEffect(()=>{
    dispatch(getMessagesByChatIdWithFB(chatId));
    },[chatId]);

    
    return  <><List sx={{ width: '100%', maxWidth: 360}}>
       {messages?.map((message,index)=>(
        <div  key={index}>
          <ListItem alignItems="flex-start">
        <ListItemAvatar>
          <Avatar/>
        </ListItemAvatar>
        <ListItemText
          primary={message.author === AUTHOR.bot ? AUTHOR.bot : name}
          secondary={
            <React.Fragment>
              <Typography
                sx={{ display: 'inline' }}
                component="span"
                variant="body2"
                color="text.primary"
              >
              </Typography>
               {message.text}
            </React.Fragment>
          }
        />
      </ListItem>
      
            <Divider variant="inset" component="li" />     
        </div>
        ))}
        </List>
        </>
}

export default MessageList;