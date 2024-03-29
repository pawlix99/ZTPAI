import React, {Component} from 'react';
import './css/Home.css';
import NavBar from "./NavBar";
import axios from "axios";
import {NavLink} from "react-router-dom";

class Home extends Component{
    constructor() {
        super();
        this.state = {
            accommodations: [],
            place: "",
            begin: "",
            end: ""
        }
        this.handleSubmit = this.handleSubmit.bind(this);
        this.handleChange = this.handleChange.bind(this);
    }

    componentDidMount() {
        axios.get('http://localhost:8000/api/accommodations',{
            headers: {
                'Content-Type':  'application/json',
                'Access-Control-Allow-Origin': '*'
            }
        })
            .then(res => {
                this.setState({accommodations: res.data['hydra:member']})
                console.log(this.state.accommodations);
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
        window.location.href = `/${this.state.place}/${this.state.begin}/${this.state.end}`;
    }

    render() {
        return(
            <div className={"App"}>
                <NavBar/>
                <div className="container">
                    <div className={"home"}>
                        <div className="search-window">
                            <form class="form-inline" onSubmit={this.handleSubmit}>
                                <div class="form-group mx-sm-3 mb-2">
                                    <input className="form-control" type="text" name="place" placeholder={"Where are you going?"} onChange={this.handleChange} required/>                                </div>
                                <div class="form-group mx-sm-3 mb-2" style={{marginRight:'0'}}>
                                    <span style={{marginRight:10+'px'}}>From:</span>
                                    <input type="date" className="form-control" name="begin" onChange={this.handleChange} required/>
                                </div>
                                <div className="form-group mx-sm-3 mb-2">
                                    <span style={{marginRight:10+'px'}}>To:</span>
                                    <input type="date" className="form-control" name="end" onChange={this.handleChange} required/>
                                </div>
                                <button type="submit" class="btn btn-primary mx-sm-3 mb-2">Find</button>
                            </form>
                        </div>
                        <div className={"accommodations"}>
                            {this.state.accommodations.map(accommodation =>
                                <NavLink to={`/accommodation/${accommodation.idAccommodation}`}>
                                    <div className={"accommodation"} key={accommodation.id}>
                                        <img src={require('./img/' + accommodation.image).default}/>
                                        <div>
                                            <h3>{accommodation.name}</h3>
                                            <h6>{accommodation.address}</h6>
                                        </div>
                                    </div>
                                </NavLink>
                                )}
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}

export default Home;