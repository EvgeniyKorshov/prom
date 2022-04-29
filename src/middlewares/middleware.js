import { AUTHOR } from '../constants/common';
import { ADD_MESSAGE ,addMessage,updateMessages} from '../store/messages/actions';
import { getDatabase,ref,push,onValue,set,remove } from 'firebase/database';
import {chatLIstUpdate} from '../store/chats/actions';
import firebaseConfig from '../services/firebaseConfig';

const middleware = store => next => action => {

    if (action.type === ADD_MESSAGE && action.payload.message.author !== AUTHOR.bot)
    {
    const botMessage = {text:'привет я бот',author:AUTHOR.bot};
    setTimeout(() => store.dispatch(addMessage(action.payload.chatId,botMessage)), 2000);
    }

    
    return next(action)
    }
    
    export const initTrackerWithFB = () => async (dispatch)=>{
        const db = getDatabase(firebaseConfig);
        const chatRef = ref(db,'/chats');
       onValue(chatRef,(snapshot)=>{
           const data = snapshot.val();
           const chatIds = Object.keys(data);
           const chatArr = chatIds.map((item) =>({
               id:item,
               name:data[item].name
            }));
           dispatch(chatLIstUpdate(chatArr));
       });
    }

    export const addChatWithFB = (name)=> async() => {
        const db = getDatabase(firebaseConfig);
        const chatRef = ref(db,'/chats');
        const newChatRef = push(chatRef);
        set(newChatRef,{name:name}).then((res)=>{
            console.log('chat added',res)
        })
}    


export const deleteChatWithFB = (id)=> async() => {
    const db = getDatabase(firebaseConfig);
    const chatRef = ref(db,`/chats/${id}`);
    const messagesRef = ref(db,`/messages/${id}`);
    remove(chatRef).then(res=>{
        console.log('chat removed',res)
    })
    remove(messagesRef).then(res=>{
        console.log('messages deleted',res)
    })
}    

export const addMessageWithFB = (chatId,message)=> async() => {
    const db = getDatabase(firebaseConfig);
    const messageRef = ref(db,`/messages/${chatId}`);
    const newMessageRef = push(messageRef);
    set(newMessageRef,message).then((res)=>{
        console.log('messages added',res)
    })
}
    export const getMessagesByChatIdWithFB = (chatId)=> async(dispatch) => {
        const db = getDatabase(firebaseConfig);
        const msgRef = ref(db,`/messages/${chatId}`);

        onValue(msgRef,(snapshot)=>{
            const data = snapshot.val();
            const msg = data && Object.values(data);
            if(msg?.length > 0){
                dispatch(updateMessages(chatId,msg));
            }
        });
    }
export default middleware;