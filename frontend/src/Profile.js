import React from 'react';
import { BrowserRouter as Router, Link} from 'react-router-dom';
import NavBar from "./NavBar";
import './css/Profile.css';

function Profile() {
        return(
            <div className={"App"}>
                <NavBar />
                <div className={"container"}>
                <div className="profile">
                    <h1>Personal informations</h1>
                    <div className={"informations"}>
                        <h2>Name: </h2>
                        <h2>Surname: </h2>
                        <h2>E-mail: </h2>
                        <h2>Phone number: </h2>
                        <h2>Adress: </h2>
                    </div>
                    <Link to={'/profile/edit'}>
                        <button>
                            Edit informations
                        </button>
                    </Link>
                </div>
                </div>
            </div>
        );
}

export default Profile;