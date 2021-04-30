import React from 'react';
import {BrowserRouter as Router, Route, Switch, withRouter} from "react-router-dom";
import Login from "./Login";
import Home from "./Home";
import Sale from "./Sale";
import History from "./History";
import Profile from "./Profile";
import EditProfile from "./EditProfile";

function App() {
  return (
      <Router>
        <Switch>
            <Route path={"/login"} component={Login} />
            <Route exact path={"/"} component={Home} />
            <Route path={"/sale"} component={Sale} />
            <Route path={"/history"} component={History} />
            <Route exact path={"/profile"} component={withRouter(Profile)} />
            <Route exact path={"/profile/edit"} component={withRouter(EditProfile)} />
        </Switch>
      </Router>
  );
}

export default App;
