import React, {Component} from 'react';
import './css/Home.css';
import NavBar from "./NavBar";
import axios from "axios";
import {NavLink} from "react-router-dom";

class Accommodation extends Component {
    constructor(props) {
        super(props);
        this.state = {
            rooms: [],
            place: "",
            begin: "",
            end: ""
        }
        this.handleSubmit = this.handleSubmit.bind(this);
        this.handleChange = this.handleChange.bind(this);
    }

    componentDidMount() {
        axios.get('http://localhost:8000/accommodation/'+ this.props.match.params.id + '/rooms/all',)
            .then(res => {
                this.setState({rooms: res.data})
                console.log(res);
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
        window.location.href = `/accommodation/${this.props.match.params.id}/${this.state.begin}/${this.state.end}`;
    }

    render() {
        return(
            <div className={"App"}>
                <NavBar/>
                <div className="container">
                    <div className="search-window">
                        <form className="form-inline" onSubmit={this.handleSubmit}>
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
                    <div className={'reservationInfo'}>
                        Select date range to make reservation!
                    </div>
                    <div className={"rooms"}>
                        {this.state.rooms.map(room =>
                            <NavLink to={`/room/${room.idRoom}`}>
                                <div className={"room"} key={room.idRoom}>
                                    <img src={require('./img/' + room.image).default}/>
                                    <div className={'roomDescription'}>
                                        <h5>Room for {room.numberOfPeople} people</h5>
                                        <h6>Price: {room.price} PLN/night</h6>
                                    </div>
                                </div>
                            </NavLink>
                        )}
                    </div>
                </div>
            </div>
        );
    }
}
export default Accommodation;