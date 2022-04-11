import { useParams} from 'react-router-dom';

const MessageList = ({chats}) =>{

    let { chatId } = useParams();

    if(!chats[chatId])return null ;

  const messages = chats[chatId].messages;
   

    return <div> {messages.map((message,index)=>(
        <div  key={index}>
            <hr/>
            <sup>{message.author}</sup>
            <p>{message.text}</p>
            <hr/>
        </div>
        ))}</div>
}

export default MessageList;