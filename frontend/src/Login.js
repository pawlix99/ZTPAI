import React from 'react';
import './css/Login.css';
import logo from './img/logo.svg';
import {Link} from "react-router-dom";

const Login = () => {
    return (
        <div className={"login"}>
            <img src={logo}></img>
            <div className={"authorization"}>
                <form>
                    <h2>Username</h2>
                    <input/>
                    <h2>Password</h2>
                    <input/>
                    <button type={"submit"}>Login</button>
                </form>
            </div>
        </div>
    );
}

export default Login;
