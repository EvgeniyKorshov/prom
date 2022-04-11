import {changeVisible} from '../store/profile/actions';
import {useCallback} from 'react';
import {useDispatch,useSelector} from 'react-redux';
const Profile = () =>{

    const {showName,name} =useSelector((state)=>state);
    const dispatch = useDispatch();

    const setShowName = useCallback(()=>{
        dispatch(changeVisible);
    },[dispatch])

    return (
    <div>
       <h1>Profile</h1> 
       <button onClick={setShowName}>Press to show name</button>
       <input
        type="checkbox"
        checked={showName}
        value={showName}
        onChange={setShowName}
        />
           {showName && <h3>{name}</h3>}
       
    </div>
    )
}

export default Profile;