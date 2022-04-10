import React, { useState ,useEffect,useRef} from 'react';
import { AUTHOR } from './common';
import TextField from '@mui/material/TextField';
import SendIcon from '@mui/icons-material/Send';
import Button from '@mui/material/Button';

const ControlPanel = () =>{
 
	const [messageList, setMessageList] = useState([]);
	const inputRef = useRef();

    const [value, setValue] = useState('');

	function handleInput(event) {
		setValue(event.target.value);
	}
  const handleClick = (e) =>{
    e.preventDefault();
    const newMessage = {
      text:value,
      author:AUTHOR.me
    }
    setMessageList([...messageList,newMessage]);
    setValue('');
    inputRef.current?.focus()
  }

  useEffect(()=>{inputRef.current?.focus()},[])
  useEffect(()=>{
    let timerid;
    if(messageList.length > 0 && messageList[messageList.length - 1].author !== AUTHOR.bot)
    {
      timerid = setInterval(() => {
        setMessageList([...messageList,newMessage])
      }, 1500);
        const newMessage = {
          text:'Обращение принято в обработку,ожидайте ответа ...',
          author:AUTHOR.bot
        }
  }
  return ()=>{
    if(timerid)
    {
      clearInterval(timerid)
    }
  } 
  },[messageList])  

    return(<div>
         <p>Список сообщений</p>
              
                {messageList.map((message,index)=>(
                    
                    <div  key={index}>
                        <hr/>
                        <sup>{message.author}</sup>
                        <p>{message.text}</p>
                        <hr/>
                    </div>
                    ))}
        <TextField 
                    inputRef={inputRef}
                    value={value} 
                    onChange={handleInput}
                    size="small"
                    /> 
                    <Button onClick={handleClick} variant="contained" size="medium" endIcon={<SendIcon />}>
                        SEND
                    </Button> 
    </div>)  
}

export default ControlPanel;