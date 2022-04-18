import { call, put, takeLatest, delay } from 'redux-saga/effects';

function* onAddMessageWithSaga(action) {
yield put(addMessage(action));
if (action.payload.message.author !== AUTHOR.bot) {
const botMessage = {text:'привет я бот',author:AUTHOR.bot};
yield delay(2000);
yield put(addMessage(chatId, botMessage));
}
}


function* mySaga() {
yield takeLatest("MESSAGES::ADD_MESSAGE_WITH_SAGA", onAddMessageWithSaga);
}


export default mySaga;