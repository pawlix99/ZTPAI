import React from 'react';
import './css/History.css';
import Kraków from './img/Kraków.jpg';
import Warszawa from './img/Warszawa.jpg';
import NavBar from "./NavBar";

const History = () => {
  return (
      <div className={"App"}>
        <NavBar />
        <div className={"container"}>
    <div className="history">
      <h1>Your reservations</h1>
      <div className="reservations">
        <div className="reservation">
          <img src={Kraków}></img>
          <div className="place">
            <h1>Kraków</h1>
          </div>
          <div className="reservationDate">
            <span>13.01.2021</span>
            <span> - </span>
            <span>18.01.2021</span>
          </div>
        </div>
        <div className="reservation">
          <img src={Warszawa}></img>
          <div className="place">
            <h1>Warszawa</h1>
          </div>
          <div className="reservationDate">
            <span>05.11.2020</span>
            <span> - </span>
            <span>12.11.2020</span>
          </div>
        </div>
        <div className="reservation">
          <img src={Kraków}></img>
          <div className="place">
            <h1>Kraków</h1>
          </div>
          <div className="reservationDate">
            <span>20.07.2020</span>
            <span> - </span>
            <span>30.07.2020</span>
          </div>
        </div>
      </div>
    </div>
        </div>
      </div>
  );
}

export default History;