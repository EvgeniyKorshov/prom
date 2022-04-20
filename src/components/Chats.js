import MessageList from '../components/MessageList';
import ChatList from '../components/ChatList';
import ControlPanel from './ControlPanel';



const Chats = () =>{

    return (
    <div>
        <ControlPanel/>
        <ChatList />
        <MessageList />
    </div>)
}

export default Chats;