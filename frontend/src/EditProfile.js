import React, {Component} from 'react';
import './css/EditProfile.css';
import NavBar from "./NavBar";
import axios from "axios";

class EditProfile extends Component{
    constructor(props){
        super(props);
        this.state = {
            name: "",
            surname: "",
            email: "",
            phone: "",
            address: ""
        }
        this.handleSubmit = this.handleSubmit.bind(this);
        this.handleChange = this.handleChange.bind(this);

    }

    componentDidMount() {
        const id = localStorage.getItem('user')
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

    handleChange(event) {
        const target = event.target;
        const value = target.type === 'checkbox' ? target.checked : target.value;
        const name = target.name;

        this.setState({
            [name]: value
        });
    }

    handleSubmit(e) {
        e.preventDefault();
        const id = localStorage.getItem('user')
        axios.put('http://localhost:8000/api/users/'+ id,
            {name: this.state.name,
            surname: this.state.surname,
            email: this.state.email,
            phone: this.state.phone,
            address: this.state.address}).then(()=>
            window.location.href = "/profile");
    }
    render() {
    return(
        <div className={"App"}>
            <NavBar />
            <div className={"container"}>
                <div className="editProfile">
                    <h1>Personal informations</h1>
                    <form encType="multipart/form-data" method="POST" onSubmit={this.handleSubmit}>
                        <div className={"informations"}>
                            <h2>Name: <input name="name" value={this.state.name} onChange={this.handleChange}/></h2>
                            <h2>Surname: <input name="surname" value={this.state.surname} onChange={this.handleChange}/></h2>
                            <h2>E-mail: <input name="email" value={this.state.email} onChange={this.handleChange}/></h2>
                            <h2>Phone number: <input name="phone" value={this.state.phone} onChange={this.handleChange}/></h2>
                            <h2>Adress: <input name="address" value={this.state.address} onChange={this.handleChange}/></h2>
                        </div>
                        <button type={"submit"}>
                            Save
                        </button>
                    </form>
                </div>
            </div>
        </div>
    );
}}

export default EditProfile;