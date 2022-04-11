import {Link } from 'react-router-dom';
import React,{ useContext } from 'react';
import List from '@mui/material/List';
import ListItem from '@mui/material/ListItem';
import ListItemAvatar from '@mui/material/ListItemAvatar';
import ListItemText from '@mui/material/ListItemText';
import Avatar from '@mui/material/Avatar';
import IconButton from '@mui/material/IconButton';
import Typography from '@mui/material/Typography';
import DeleteIcon from '@mui/icons-material/Delete';
import {ThemeContext} from '../App';

const ChatList = ({chats}) =>{

const contextValue = useContext(ThemeContext);

    return (<div>

     
      <Typography sx={{ mt: 4, mb: 2 }} variant="h6" component="div">
            ChatList <br/>
            My theme is <h1>{contextValue.theme}</h1>
            <button onClick={()=>contextValue.setTheme(contextValue.theme ==='light'? 'dark':'light')}>Press to change theme</button>
      </Typography>
     
            <List >
      {Object.keys(chats).map((chat,index)=>(
        <div><Link to={`/chats/${chat}`} key={index}>
        
        <ListItem
                  secondaryAction={
                    <IconButton edge="end" aria-label="delete">
                      <DeleteIcon />
                    </IconButton>
                  }
                >
                  <ListItemAvatar>
                    <Avatar/>
                  </ListItemAvatar>
                  <ListItemText
                    primary={chats[chat].name}
                  
                  />
                </ListItem>
        </Link></div>
          
            
              
           
          
         

        
    ))} </List></div>)
}

export default ChatList;