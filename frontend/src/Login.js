import React, {Component} from 'react';
import './css/Login.css';
import logo from './img/logo.svg';
import axios from 'axios';
import {Link} from "react-router-dom";

class Login extends Component{
    constructor(props){
        super(props);
        this.state = {
            email: "",
            password: ""
        }
        this.handleSubmit = this.handleSubmit.bind(this);
        this.handleChange = this.handleChange.bind(this);
    }

    componentDidMount() {
        localStorage.clear();
    }

    handleChange(event) {
        const target = event.target;
        const value = target.type === 'checkbox' ? target.checked : target.value;
        const name = target.name;

        this.setState({
            [name]: value
        });
    }

    handleSubmit = e => {
        e.preventDefault();

        const data = {email: this.state.email,
            password: this.state.password
        };

        axios.post('http://localhost:8000/auth/login', data)
            .then(res => {
                if(res.data.token){
                    localStorage.setItem('token', res.data.token);
                    localStorage.setItem('user', res.data.user);
                    window.location.href = "/";
                }})
    };

    render() {
    return (
        <div className={"login"}>
            <img src={logo}></img>
            <div className={"authorization"}>
                <form encType="multipart/form-data" method="POST" onSubmit={this.handleSubmit}>
                    <h2>Username</h2>
                    <input name="email" type="text" onChange={this.handleChange}/>
                    <h2>Password</h2>
                    <input name="password" type="password" onChange={this.handleChange}/>
                    <button type={"submit"}>Login</button>
                </form>
                <Link to="/register">Register</Link>
            </div>
        </div>
    );}
}

export default Login;