import React, {Component} from 'react';
import './css/History.css';
import NavBar from "./NavBar";
import axios from "axios";

class History extends Component {
  constructor(props) {
    super(props);
    this.state = {
      reservations: [],
    }
  }

  componentDidMount() {
    const id = localStorage.getItem('user')
    axios.get('http://localhost:8000/reservations/'+ id)
        .then(res => {
          this.setState({reservations: res.data});
          console.log(this.state.reservations);
        });
  }

  render() {
    return (
        <div className={"App"}>
          <NavBar />
          <div className={"container"}>
            <div className="history">
              <h1>Your reservations</h1>
              <div className="reservations">
                {this.state.reservations.map(res =>
                    <div className={"reservation"} >
                      <img src={require("./img/" + res.image).default}/>
                      <div className="place">
                        <h2>{res.name}</h2>
                          <h5>{res.address}</h5>
                      </div>
                        <div className={'room-info'}>
                            <h5>Room for {res.numberOfPeople} people</h5>
                            <h6>Price: {res.price} PLN/night</h6>
                        </div>
                      <div className="reservationDate">
                          <h6>From: {res.sinceWhen}</h6>
                          <h6>To: {res.untilWhen}</h6>
                      </div>
                    </div>
                )}
              </div>
            </div>
          </div>
        </div>
    );
  }
}

export default History;