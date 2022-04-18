import { createStore,combineReducers,compose,applyMiddleware} from 'redux';
import messagesReducer from './messages/reducer';
import profileReducer from './profile/reducer';
import chatsReducer from './chats/reducer';
import thunk from 'redux-thunk';

const reducers = combineReducers({
    profile:profileReducer,
    chats:chatsReducer,
    messages:messagesReducer
});

const composeEnhancers = window.__REDUX_DEVTOOLS_EXTENSION_COMPOSE__ || compose;

const store = createStore(reducers,composeEnhancers(applyMiddleware(thunk)))

export default store;