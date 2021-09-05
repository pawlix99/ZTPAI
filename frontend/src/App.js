import React from 'react';
import {BrowserRouter as Router, Route, Switch} from "react-router-dom";
import Login from "./Login";
import Home from "./Home";
import Sale from "./Sale";
import History from "./History";
import Profile from "./Profile";
import EditProfile from "./EditProfile";
import Register from "./Register";
import Accommodation from "./Accommodation";
import Room from "./Room";
import ChosenRoom from "./ChosenRoom";
import ChosenAccommodations from "./ChosenAccommodations";
import ChosenRooms from "./ChosenRooms";

function App() {

  return (
      <Router>
        <Switch>
            <Route path={"/login"} component={Login} />
            <Route path={"/register"} component={Register} />
            <Route exact path={"/"} component={Home} />
            <Route exact path={"/:place/:begin/:end"} render={(props) => <ChosenAccommodations {...props}/> } />
            <Route exact path={"/accommodation/:id"} render={(props) => <Accommodation {...props}/> } />
            <Route exact path={"/accommodation/:id/:begin/:end"} render={(props) => <ChosenRooms {...props}/> } />
            <Route exact path={"/room/:id"} render={(props) => <Room {...props}/> } />
            <Route exact path={"/room/:id/:begin/:end"} render={(props) => <ChosenRoom {...props}/> } />
            <Route path={"/sale"} component={Sale} />
            <Route path={"/history"} component={History} />
            <Route exact path={"/profile"} component={Profile} />
            <Route exact path={"/profile/edit"} component={EditProfile} />
        </Switch>
      </Router>
  );
}

export default App;
