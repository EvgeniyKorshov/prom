
import './App.css';
import React,{ useState } from 'react';
import Router from './pages/Router';
import AuthProvider from './hooks/AuthProvider';

export const ThemeContext = React.createContext({theme:'dark'});
function App() {
  const [theme, setTheme] = useState('dark');
  return (
    <div className="App">
      <header className="App-header">
      <ThemeContext.Provider value={{theme:theme,setTheme:setTheme}}>
        <AuthProvider>
          <Router/>
        </AuthProvider>
        
      </ThemeContext.Provider>
      
      </header>
    </div>
  );
}

export default App;
