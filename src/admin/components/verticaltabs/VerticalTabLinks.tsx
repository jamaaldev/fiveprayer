import * as React from "react";

import { NavLink } from "react-router-dom";
import "./css/VerticalTabLinks.scss";

function VerticalTabLinks() {
  return (
    <>
      <div className="vertical_tab">
        <NavLink to={"/settings/generalsettings"}>
          <button className="tablinks vertical_tab">General Settings</button>
        </NavLink>

        <NavLink to={"/settings/othersettings"}>
          <button className="tablinks vertical_tab">Other Settings</button>
        </NavLink>

        <NavLink to={"/settings/googleaddress"}>
          <button className="tablinks vertical_tab">Prayer Configuration</button>
        </NavLink>
       {/*  <NavLink to={"/settings/locationsetting"}>
          <button className="tablinks vertical_tab">Prayer Configuration</button>
        </NavLink> */}
      </div>
    </>
  );
}

export default VerticalTabLinks;
