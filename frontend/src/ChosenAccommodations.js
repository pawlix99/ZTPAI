import React, {Component} from 'react';
import './css/Home.css';
import NavBar from "./NavBar";
import axios from "axios";
import {NavLink} from "react-router-dom";

class ChosenAccommodations extends Component{
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
        axios.get(`http://localhost:8000/${this.props.match.params.place}/${this.props.match.params.begin}/${this.props.match.params.end}`)
            .then(res => {
                this.setState({accommodations: res.data})
                this.setState({place: this.props.match.params.place});
                this.setState({begin: this.props.match.params.begin});
                this.setState({end: this.props.match.params.end});
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
                    <div className={"chosenAccommodations"}>
                        <div className="search-window">
                            <form className="form-inline" onSubmit={this.handleSubmit}>
                                <div className="form-group mx-sm-3 mb-2">
                                    <input className="form-control" type="text" name="place"
                                           value={this.state.place} onChange={this.handleChange}/></div>
                                <div className="form-group mx-sm-3 mb-2" style={{marginRight: '0'}}>
                                    <span style={{marginRight: 10 + 'px'}}>From:</span>
                                    <input type="date" className="form-control" name="begin"
                                           value={this.state.begin} onChange={this.handleChange}/>
                                </div>
                                <div className="form-group mx-sm-3 mb-2">
                                    <span style={{marginRight: 10 + 'px'}}>To:</span>
                                    <input type="date" className="form-control" name="end"
                                           value={this.state.end} onChange={this.handleChange}/>
                                </div>
                                <button type="submit" className="btn btn-primary mx-sm-3 mb-2">Find</button>
                            </form>
                        </div>
                        <div className={"accommodations"}>
                            {this.state.accommodations.map(accommodation =>
                                <NavLink to={`/accommodation/${accommodation.idAccommodation}/${this.props.match.params.begin}/${this.props.match.params.end}`}>
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

export default ChosenAccommodations;