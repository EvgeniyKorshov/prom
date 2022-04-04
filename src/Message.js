import React from 'react';


const Message = ({text}) =>{
  return (
      <>
      <div>от: {text.author}</div>
      <div>Текст сообщения: {text.text} </div>
     
      </>
    
  )
}

export default Message