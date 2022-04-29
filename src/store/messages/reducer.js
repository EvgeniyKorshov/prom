import { ADD_MESSAGE ,UPDATE_MESSAGES} from './actions';

    const initialState = {
        messageList:{}
    }

    const messagesReducer = (state = initialState, actions) => {
    switch (actions.type) {
        case ADD_MESSAGE:{
            const {chatId,message} = actions.payload;
            const oldMessages = state.messageList[chatId] || [];
            return {
            ...state,
            messageList:{
                ...state.messageList,
                [chatId]:[
                    ...oldMessages,
                    {
                        ...message,
                        id:`${chatId}${oldMessages.lenght}`
                    }
                ]
            
            }}
        }

        case UPDATE_MESSAGES:
            return {
                ...state,
            messageList:{
                ...state.messageList,
                [actions.chatId]:actions.messages
            }

        }   
        
        default: return state;
        }
    }
export default messagesReducer;