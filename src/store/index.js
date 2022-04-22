import { createStore,combineReducers,applyMiddleware,compose} from 'redux';

import messagesReducer from './messages/reducer';
import profileReducer from './profile/reducer';
import chatsReducer from './chats/reducer';
import gistsReducer from './gists/reducer';
//import createSagaMiddleware from 'redux-saga';
//import mySaga from './sagas'
import {persistStore,persistReducer} from 'redux-persist';
import storage from 'redux-persist/lib/storage';
import thunk from 'redux-thunk';


//const sagaMiddleware = createSagaMiddleware();

const reducers = combineReducers({
    profile:profileReducer,
    chats:chatsReducer,
    messages:messagesReducer,
    gists:gistsReducer
});
const composeEnhancers = window.__REDUX_DEVTOOLS_EXTENSION_COMPOSE__ || compose;

const persistConfig = {
    key: 'root',
    storage,
    }
  
   
const persistedReducer = persistReducer(persistConfig, reducers);

export const store = createStore(
        persistedReducer,
        composeEnhancers(applyMiddleware(thunk))
        );
        
const  persistor = persistStore(store);
export default persistor;
//sagaMiddleware.run(mySaga);