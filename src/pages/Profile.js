import {changeVisible,updateName} from '../store/profile/actions';
import {useCallback,useState} from 'react';
import {useDispatch,useSelector} from 'react-redux';
import {Button,TextField} from '@mui/material';
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
       <Button onClick={setShowName} variant="contained" size="medium" >Press to show name</Button>
            <br/>
       
           {showName && <h3>Name: {name}</h3>}
           <TextField 
                    name='name'
                    label='name'
                    placeholder='введите ваше имя'
                    value={value} 
                    onChange={handleInput}/> 
            <br/>
            <Button onClick={saveNAme} variant="contained" size="medium" >Save</Button>
    </div>
    )
}

export default Profile;