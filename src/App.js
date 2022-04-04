
import './App.css';
import Message from './Message';
import React, { useState ,useEffect} from 'react';
import { AUTHOR } from './common';

function App() {

  const [value, setValue] = useState('');
	const [messageList, setMessageList] = useState([]);
	
	function handleInput(event) {
		setValue(event.target.value);
   
  
	}
  const handleClick = () =>{
  
    const newMessage = {
      text:value,
      author:AUTHOR.me
    }
    setMessageList([...messageList,newMessage])
  }

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

  return (
    <div className="App">
      <header className="App-header">
        
      
        <div>
              <p>Список сообщений</p>
              <hr/>

              {messageList.map((message,index)=>(
              <div  key={index}>
                <sup>{message.author}</sup>
                <p>{message.text}</p>
                <hr/>
              </div>
              ))}

              <input 
              value={value} 
              onChange={handleInput}
              />
              
              <button onClick={handleClick}>Оправить сообщение</button>

          </div>
      </header>
    </div>
  );
}

export default App;
