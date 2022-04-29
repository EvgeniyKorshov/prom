import { ADD_CHAT, CHATS_UPDATE } from './actions';

    const initialState = {
    chatList:[]
    }

    const chatsReducer = (state = initialState, actions) => {
    switch (actions.type) {
        case ADD_CHAT:
            return {
            ...state,
                chatList:[...state.chatList,
                        {
                            id:`id${state.chatList.length}`,
                            name:actions.payload
                        }
                ]
            }

        case CHATS_UPDATE:
            return {
                ...state,
                chatList:actions.chats
            }    
        default: return state;
        }
    }
export default chatsReducer;