import React, {Component} from 'react';
import NavBar from "./NavBar";
import './css/Profile.css';
import axios from "axios";

class Profile extends Component{
    constructor() {
        super();
        this.state = {
            name: "",
            surname: "",
            email: "",
            phone: "",
            address: ""
        }
    }

    componentDidMount() {
        const id = localStorage.getItem("user");
        axios.get('http://localhost:8000/user/' +id).then(user => {
            this.setState({
                name: user.data[0].name,
                surname: user.data[0].surname,
                email: user.data[0].email,
                phone:  user.data[0].phone,
                address: user.data[0].address
            });
            console.log(user.data);
        });
    }
    render() {
    return (
            <div className={"App"}>
                <NavBar/>
                <div className={"container"}>
                    <div className="profile">
                        <p className={"personal-informations"}>Personal informations</p>
                        <form action={"/profile/edit"}>
                            <div className={"informations"}>
                                <h2 style={{marginBottom:15, fontSize:2.5+'vw'}}>Name: {this.state.name}</h2>
                                <h2 style={{marginBottom:15, fontSize:2.5+'vw'}}>Surname: {this.state.surname}</h2>
                                <h2 style={{marginBottom:15, fontSize:2.5+'vw'}}>E-mail: {this.state.email}</h2>
                                <h2 style={{marginBottom:15, fontSize:2.5+'vw'}}>Phone number: {this.state.phone}</h2>
                                <h2 style={{marginBottom:15, fontSize:2.5+'vw'}}>Adress: {this.state.address}</h2>
                                <button type="submit" className="btn btn-primary mx-sm-3 mb-2">Edit informations</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        );
}}

export default Profile;