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
        axios.get('http://localhost:8000/api/users/'+ id).then(user => {
            this.setState({
                name: user.data.name,
                surname: user.data.surname,
                email: user.data.email,
                phone:  user.data.phone,
                address: user.data.address
            });
        });
    }
    render() {
    return (
            <div className={"App"}>
                <NavBar/>
                <div className={"container"}>
                    <div className="profile">
                        <h1>Personal informations</h1>
                        <form action={"/profile/edit"}>
                        <div className={"informations"}>
                            <h2>Name: {this.state.name}</h2>
                            <h2>Surname: {this.state.surname}</h2>
                            <h2>E-mail: {this.state.email}</h2>
                            <h2>Phone number: {this.state.phone}</h2>
                            <h2>Adress: {this.state.address}</h2>
                        </div>
                        <button type={"submit"}>
                            Edit informations
                        </button>
                        </form>
                    </div>
                </div>
            </div>
        );
}}

export default Profile;