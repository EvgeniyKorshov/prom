
import './App.css';
import React from 'react';
import Router from './Router';

export const ThemeContext = React.createContext({theme:'dark'});
function App() {

  return (
    <div className="App">
      <header className="App-header">
      <ThemeContext.Provider value={{theme:'dark'}}>
      <Router/>
        </ThemeContext.Provider>
      
      </header>
    </div>
  );
}

export default App;
