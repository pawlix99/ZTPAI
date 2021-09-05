import React from 'react';
import {Link} from "react-router-dom";
import logo from "./img/logo.svg";
import {FaPowerOff} from "react-icons/fa";
import './css/NavBar.css';
function NavBar() {
    if(!localStorage.getItem('token')){
        window.location.href = "/login";
    }
    return(
        <nav className={"Navbar"}>
            <img src={logo}></img>
            <ul>
                <li>
                    <Link to="/">HOME</Link>
                </li>
                <li>
                    <Link to="/history">HISTORY</Link>
                </li>
                <li>
                    <Link to="/profile">PROFILE</Link>
                </li>
            </ul>
            <Link to="/login"><FaPowerOff /></Link>
        </nav>
    );
}

export default NavBar;