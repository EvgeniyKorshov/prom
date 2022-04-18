import {changeVisible,updateName} from '../store/profile/actions';
import {useCallback,useState} from 'react';
import {useDispatch,useSelector} from 'react-redux';
import { TextField } from '@mui/material';

const Profile = () =>{

    const {showName,name} =useSelector((state)=>state.profile);
    const dispatch = useDispatch();
    const [value,setValue] = useState(name);
    
    const setShowName = useCallback(()=>{
        dispatch(changeVisible);
    },[dispatch])
    const handleInput = (e)=>{
        setValue(e.target.value);
    }
    const saveNAme=()=>{
        dispatch(updateName(value));
    }
    return (
    <div>
       <h1>Profile</h1> 
       <button onClick={setShowName}>Press to show name</button>
            <br/>
       
           {showName && <h3>текущее имя {name}</h3>}
           <TextField 
                    name='name'
                    label='name'
                    placeholder='введите ваше имя'
                    value={value} 
                    onChange={handleInput}/> 
            <br/>
            <button onClick={saveNAme}>сохранить</button>
    </div>
    )
}

export default Profile;