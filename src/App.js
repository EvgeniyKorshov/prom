
import './App.css';
import React,{ useState } from 'react';
import Router from './pages/Router';

export const ThemeContext = React.createContext({theme:'dark'});
function App() {
  const [theme, setTheme] = useState('dark');
  return (
    <div className="App">
      <header className="App-header">
      <ThemeContext.Provider value={{theme:theme,setTheme:setTheme}}>
        <Router/>
      </ThemeContext.Provider>
      
      </header>
    </div>
  );
}

export default App;
