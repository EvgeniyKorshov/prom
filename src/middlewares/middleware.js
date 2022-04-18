import { AUTHOR } from '../constants/common';
import { ADD_MESSAGE ,addMessage} from '../store/messages/actions';

const middleware = store => next => action => {

    if (action.type === ADD_MESSAGE && action.payload.message.author !== AUTHOR.bot)
    {
    const botMessage = {text:'привет питушара',author:AUTHOR.bot};
    setTimeout(() => store.dispatch(addMessage(action.payload.chatId,botMessage)), 2000);
    }

    
    return next(action)
    }
    
    export default middleware;