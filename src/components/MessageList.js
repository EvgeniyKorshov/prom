import { useParams} from 'react-router-dom';
import * as React from 'react';
import{ List,ListItem,Divider,ListItemText,ListItemAvatar,Avatar,Typography} from '@mui/material';
import { AUTHOR } from '../constants/common';
import {useSelector} from 'react-redux';

const MessageList = () =>{
  const allMessages = useSelector(state =>state.messages.messageList);
  
    let { chatId } = useParams();

    const {name} = useSelector((state)=> state.profile)

    if(!allMessages[chatId])return null ;

  const messages = allMessages[chatId];
   

    return  <><List sx={{ width: '100%', maxWidth: 360}}>
       {messages.map((message)=>(
        <div  key={message.chatId}>
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