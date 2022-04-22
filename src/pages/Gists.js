import {useCallback} from 'react';
import CircularProgress from '@mui/material/CircularProgress';
import { useDispatch,useSelector } from 'react-redux';
import { selectGists,selectGistsError,selectGistsLoading } from '../store/gists/selectors';
import { getAllGists } from '../store/gists/actions';
//import {API_URL_PUBLIC} from '../constants/gists';

const Gists = () =>{
   /* const [gists,setGists]=useState([]);
    const [error, setError] = useState(false);
    const [loading, setLoading] = useState(false);*/
   const dispatch = useDispatch();
   const gists = useSelector(selectGists);
   const error = useSelector(selectGistsError);
   const loading = useSelector(selectGistsLoading);
    
    const requestGists = /*useCallback( async*/ () => {
            dispatch(getAllGists());
            /*
            setLoading(true);
            try{
                const response = await fetch(API_URL_PUBLIC)
    
                if (!response.ok) {
                    throw new Error(`Request failed with status ${response.status}`);
                    }
                    const result = await response.json();
                    setGists(result);
            }catch(e){
                console.error(e);
                setError(true)
            }finally{
                setLoading(false);
            }
            */
        }
    /*,[])

    useEffect(()=>{
        requestGists();
    },[])
    */
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