import React, {Component} from 'react';
import './css/Home.css';
import NavBar from "./NavBar";
import axios from "axios";

class Room extends Component {
    constructor(props) {
        super(props);
        this.state = {
            room: [],
        }
    }

    componentDidMount() {
        axios.get('http://localhost:8000/room/'+ this.props.match.params.id)
            .then(res => {
                this.setState({room: res.data});
                console.log(this.state.room);

            });
    }

    render() {
        return(
            <div className={"App"}>
                <NavBar/>
                <div className="container">
                    <div className={'singleRoom'}>
                        {this.state.room.map(room =>
                            <div className={"roomDetails"} key={room.idRoom}>
                                <img src={require('./img/' + room.image).default}/>
                                <div className={'roomDescription'}>
                                    <h2 style={{paddingBottom:10}}>Room for {room.numberOfPeople} people</h2>
                                    <h4 style={{paddingBottom:15}}>Price: {room.price} PLN/night</h4>
                                    <div>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam mauris dui, sagittis a venenatis fermentum, molestie id ipsum. Curabitur commodo ligula posuere fermentum ornare. In hac habitasse platea dictumst.
                                    </div>
                                </div>
                            </div>
                        )}
                    </div>
                </div>
            </div>
        );
    }
}
export default Room;