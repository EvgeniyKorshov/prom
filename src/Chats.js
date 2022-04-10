import MessageList from './MessageList';
import ChatList from './ChatList';



const Chats = ({chats}) =>{

    return (
    <div>
        <ChatList chats={chats}/>
        <MessageList chats={chats}/>
    </div>)
}

export default Chats;