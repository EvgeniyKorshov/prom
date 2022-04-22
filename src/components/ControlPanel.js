import React, { useState ,useEffect,useRef} from 'react';
import SendIcon from '@mui/icons-material/Send';
import {Button,TextField} from '@mui/material';
import {useDispatch, useSelector} from 'react-redux';
import { useParams} from 'react-router-dom';
import {addMessageWithThunk} from '../store/messages/actions'

const ControlPanel = () =>{
  let { chatId } = useParams();
	const inputRef = useRef();
  const dispatch = useDispatch();
  const authorName = useSelector(state=>state.profile.name)
  const [value, setValue] = useState('');

	function handleInput(event) {
		setValue(event.target.value);
	}
  const handleClick = (e) =>{
    e.preventDefault();
   
    const newMessage = {
      text:value,
      author:authorName
    }
    dispatch(addMessageWithThunk(chatId,newMessage));
    setValue('');
    inputRef.current?.focus()
  }

  useEffect(()=>{inputRef.current?.focus()},[])
 

    return(<div>
        
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