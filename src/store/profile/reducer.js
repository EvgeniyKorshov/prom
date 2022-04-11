import { TOGGLE_NAME } from './actions';

    const initialState = {
    showName: false,
    name: 'Evgeniy'
    }
    const profileReducer = (state = initialState, actions) => {
    switch (actions.type) {
    case TOGGLE_NAME:
    return {
    ...state,
    showName: !state.showName
    }
    default:
    return state
    }
}
export default profileReducer;