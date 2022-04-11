import MessageList from '../components/MessageList';
import ChatList from '../components/ChatList';



const Chats = ({chats}) =>{

    return (
    <div>
        <ChatList chats={chats}/>
        <MessageList chats={chats}/>
    </div>)
}

export default Chats;