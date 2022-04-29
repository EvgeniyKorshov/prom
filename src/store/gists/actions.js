import {API_URL_PUBLIC} from '../../constants/gists';

export const GET_GISTS_REQUEST = "GISTS::GET_GISTS_REQUEST";
export const GET_GISTS_SUCCESS = "GISTS::GET_GISTS_SUCCESS";
export const GET_GISTS_FAILURE = "GISTS::GET_GISTS_FAILURE";

export const getGistsRequest = () => ({
type: GET_GISTS_REQUEST,
});
export const getGistsSuccess = (gists) => ({
type: GET_GISTS_SUCCESS,
payload: gists,
});
export const getGistsFailure = async (err) => ({
type: GET_GISTS_FAILURE,
payload: err,
});

export const getAllGists = () => async (dispatch) => {
    dispatch(getGistsRequest());
    try {
    const res = await fetch(API_URL_PUBLIC);
    console.log(res.status)
    if (!res.ok) {
    throw new Error(`Request failed with status ${res.status}`);
    }
    const result = await res.json();
    dispatch(getGistsSuccess(result));
    
    } catch (err) {
    dispatch(getGistsFailure(err.message));
    console.error(err);
    }
    };