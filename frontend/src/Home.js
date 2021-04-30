import React from 'react';
import './css/Home.css';
import NavBar from "./NavBar";

function Home() {
  return(
<div className={"App"}>
      <NavBar/>
      <div className="container">
        <div className={"home"}>
        <div className="search-window">
        <h1>Find accomodation</h1>
        <form>
          <label>
            <span>Where are you going?</span>
            <input type="text" name="name" />
            <div className="date">
              <span>From:</span>
              <input type="date" name="" />
              <span>To:</span> 
              <input type="date" name="" />
            </div>
          </label>
          <input className="button" type="submit" value="Find" />
        </form>
      </div>
    </div>
      </div>
</div>
);
}

export default Home;