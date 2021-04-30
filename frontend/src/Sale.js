import React from 'react';
import './css/Sale.css';
import promotion1 from './img/Kraków.jpg';
import promotion2 from './img/Warszawa.jpg';
import promotion3 from './img/Łódź.jpg';
import promotion4 from './img/Wrocław.jpg';
import promotion5 from './img/Poznań.jpg';
import NavBar from "./NavBar";

const Sale = () => {
  return (
      <div className="App">
        <NavBar/>
    <div className="container">
      <div className={"sale"}>
      <h1>Available promotions</h1>
      <div className="promotions">
        <div className="promotion">
          <img src={promotion1}></img>
          <section>
              <div className="title">
                <h1>Kraków <span>-15%</span></h1>
              </div>
              <div className="description">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam mauris dui, sagittis a venenatis fermentum, molestie id ipsum. Curabitur commodo ligula posuere fermentum ornare. In hac habitasse platea dictumst.
              </div>
            </section>
        </div>
        <div className="promotion">
          <img src={promotion2}></img>
          <section>
            <div className="title">
              <h1>Warszawa <span>-20%</span></h1>
            </div>
            <div className="description">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam mauris dui, sagittis a venenatis fermentum, molestie id ipsum. Curabitur commodo ligula posuere fermentum ornare. In hac habitasse platea dictumst.
            </div>
          </section>
        </div>
        <div className="promotion">
          <img src={promotion3}></img>
          <section>
            <div className="title">
              <h1>Łódź <span>-10%</span></h1>
            </div>
            <div className="description">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam mauris dui, sagittis a venenatis fermentum, molestie id ipsum. Curabitur commodo ligula posuere fermentum ornare. In hac habitasse platea dictumst.
            </div>
          </section>
        </div>
        <div className="promotion">
          <img src={promotion4}></img>
          <section>
            <div className="title">          
              <h1>Wrocław <span>-17%</span></h1>
            </div>
            <div className="description">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam mauris dui, sagittis a venenatis fermentum, molestie id ipsum. Curabitur commodo ligula posuere fermentum ornare. In hac habitasse platea dictumst.
            </div>
          </section>
        </div>
        <div className="promotion">
          <img src={promotion5}></img>
          <section>
            <div className="title">
              <h1>Poznań <span>-12%</span></h1>
            </div>
            <div className="description">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam mauris dui, sagittis a venenatis fermentum, molestie id ipsum. Curabitur commodo ligula posuere fermentum ornare. In hac habitasse platea dictumst.
            </div>
          </section>
        </div>
      </div>
    </div>
    </div>
      </div>

  );
}

export default Sale;