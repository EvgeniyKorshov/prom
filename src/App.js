import Footer from './components/Footer/Footer';
import Registration from './components/Registration/Registration';
import Authorization from './components/Authorization/Authorization';
import Header from './components/Header/Header';
 import './App.scss';

function App() {
  return (
    <div className="App">
      <header className="App-header">
        
        < Header/>
        </header>
        <main className='Main-part'>
        < Authorization/>
        < Registration/>
      </main>
        
        < Footer/>
      
    </div>
  );
}

export default App;
