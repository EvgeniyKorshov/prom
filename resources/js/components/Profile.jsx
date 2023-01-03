import React from 'react';
import axios from 'axios';


class Profile extends React.Component {
    state = {
        persons: []
      }
    
      componentDidMount() {
        axios.get(`http://127.0.0.1:8000/api/users`)
          .then(res => {
            const persons = res.data;
            this.setState({ persons });
          })
      }
    
      render() {
        return (
            <div className="container">
                <div className="row justify-content-center">
                    <div className="col-md-8">
                        <div className="card">
                            <div className="card-header">Список пользователей</div>
                            <div className="card-body">
                                <ul>
                                    { this.state.persons.map(person => <li>{
                                    person['id'] + ' ' + person['username']
                                    }</li>)}
                                
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         
        )
      }
  }
  export default Profile;
