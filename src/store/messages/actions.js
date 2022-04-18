import { AUTHOR } from '../../constants/common';

export const ADD_MESSAGE = 'MESSAGES::ADD_MESSAGE';

export const addMessage = (chatId,message) => ({
    type: ADD_MESSAGE,
    payload:{chatId,message}
    });

export const addMessageWithThunk = (chatId, message) => (dispatch, _getState) => {
    dispatch(addMessage(chatId, message));
    if (message.author !== AUTHOR.bot) {
    const botMessage = {text:'привет я бот',author:AUTHOR.bot};
    setTimeout(() => dispatch(addMessage(chatId, botMessage)), 2000);
    }
    }
    