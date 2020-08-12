import React from 'react';
import './App.css';
import {BrowserRouter,Route,Switch} from 'react-router-dom'
import Navbar from './components/Navbar'
import Home from './components/Home'
import About from './components/About'
import Contact from './components/Contact'

function App() {
  return (
    <div>
    
      <BrowserRouter> 
       <Navbar /> 
       <Switch> 
         <div>
         <Route path="/" exact component={Home}/>
         <Route path="About" component ={About}/>
         <Route path="Contact" component={Contact}/>
         </div>
      </Switch>
    </BrowserRouter>
    </div>
  );
}

export default App;
