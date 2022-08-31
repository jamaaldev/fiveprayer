import * as React from "react";

import { NavLink } from "react-router-dom";

import "./css/HeaderTabLinks.scss";

const HeaderTabLinks = () => {
  return (
    <>
      <div className="tab">
        <div className="logo">
          {/* <img className="logos" src="/" alt="logo" width="120px"/> */}
          {/* you can delete h3 after you insert your svg or img logo in img element */}
          <h3>Beta App Prayer</h3>
        </div>
        <NavLink to={"/"}>
          <button className="tablinks dashboard">Prayer Settings</button>
        </NavLink>
        <NavLink to={"/templates"}>
          <button className="tablinks templates">Templates</button>
        </NavLink>
        <NavLink to={"/settings/settings"}>
          <button className="tablinks settings">Settings</button>
        </NavLink>
        <NavLink to={"/support"}>
          <button className="tablinks support">Support</button>
        </NavLink>
      </div>
    </>
  );
};

export default HeaderTabLinks;
