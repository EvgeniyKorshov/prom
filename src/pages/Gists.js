import {useCallback} from 'react';
import CircularProgress from '@mui/material/CircularProgress';
import { useDispatch,useSelector } from 'react-redux';
import { selectGists,selectGistsError,selectGistsLoading } from '../store/gists/selectors';
import { getAllGists } from '../store/gists/actions';

const Gists = () =>{
   const dispatch = useDispatch();
   const gists = useSelector(selectGists);
   const error = useSelector(selectGistsError);
   const loading = useSelector(selectGistsLoading);
    
    const requestGists =  () => {
            dispatch(getAllGists());
        }
    
    const renderGist =  useCallback((gist) => <li key={gist.id}>{gist.description || 'No description'}</li>,[]);

    if(loading){
        return <CircularProgress/>
    }

    if(error){
       return ( <>
        <h3>Error</h3>
        <button onClick={requestGists}>Retry</button>
        </>)
    }

    return <ul>{gists.map(renderGist)}</ul>
    
}

export default Gists;