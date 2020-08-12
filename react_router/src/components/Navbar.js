import React from 'react'
import {Link} from 'react-router-dom'
import  './navbarStyle.css'

function Navbar() {
    return (
        <div className="menu">
    <ul>
     <li><Link to="/" class="active">Home</Link></li>
      <li><Link to="#">News</Link></li>
       <li><Link to="/Contact">Contact</Link></li>
        <li><Link to="/About">About</Link></li>
        </ul>
      </div>
        
    )
}

export default Navbar

