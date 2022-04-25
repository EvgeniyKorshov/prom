import { TOGGLE_NAME,UPDATE_NAME } from './actions';

    const initialState = {
    showName: true,
    name: 'Evgeniy'
    }
    const profileReducer = (state = initialState, actions) => {
    switch (actions.type) {
    case TOGGLE_NAME:
    return {
    ...state,
    showName: !state.showName
    }

    case UPDATE_NAME:
    return {
    ...state,
    name: actions.payload
    }
    

    default:
    return state
    }
}
export default profileReducer;