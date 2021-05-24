import React, {Component} from 'react';
import './css/Login.css';
import logo from './img/logo.svg';
import axios from 'axios';
import {Link} from "react-router-dom";

class Register extends Component{
    constructor(props){
        super(props);
        this.state = {
            email: "",
            password: "",
            name: "",
            surname: "",
            phone: "",
            address: ""
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

        const data = {
            email: this.state.email,
            password: this.state.password,
            name: this.state.name,
            surname: this.state.surname,
            phone: this.state.phone,
            address: this.state.address
        };

        axios.post('http://localhost:8000/auth/register', data)
            .then(res => {
                if(res.data.user){
                    window.location.href = "/login";
                }})
    };

    render() {
        return (
            <div className={"login"}>
                <img src={logo} alt={"logo"} />
                <div className={"authorization"}>
                    <form encType="multipart/form-data" method="POST" onSubmit={this.handleSubmit}>
                        <h2>E-mail</h2>
                        <input name="email" type="text" onChange={this.handleChange}/>
                        <h2>Password</h2>
                        <input name="password" type="password" onChange={this.handleChange}/>
                        <h2>Name</h2>
                        <input name="name" type="text" onChange={this.handleChange}/>
                        <h2>Surname</h2>
                        <input name="surname" type="text" onChange={this.handleChange}/>
                        <h2>Phone</h2>
                        <input name="phone" type="text" onChange={this.handleChange}/>
                        <h2>Address</h2>
                        <input name="address" type="text" onChange={this.handleChange}/>
                        <button type={"submit"}>Register</button>
                    </form>
                    <Link to="/login">Login</Link>
                </div>
            </div>
        );}
}

export default Register;