import React from 'react';
import { BrowserRouter as Link} from "react-router-dom";
import './css/EditProfile.css';
import NavBar from "./NavBar";

function EditProfile() {
        return(
                <div className={"App"}>
                <NavBar />
                <div className={"container"}>
                <div className="editProfile">
                    <h1>Personal informations</h1>
                    <form action={"/profile"}>
                        <div className={"informations"}>
                            <h2>Name: <input name="name" /></h2>
                            <h2>Surname: <input name="surname" /></h2>
                            <h2>E-mail: <input name="email" /></h2>
                            <h2>Phone number: <input name="phone" /></h2>
                            <h2>Adress: <input name="address" /></h2>
                        </div>
                        <button type={"submit"}>
                            Save
                        </button>
                    </form>
                </div>
                </div>
            </div>
        );
}

export default EditProfile;