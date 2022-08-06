import * as React from "react";

import { Routes, Route } from "react-router-dom";
import GeneralSettings from "./pages/GeneralSettings";
import GoogleAddress from "./pages/GoogleAddress";
import { LocationSetting } from "./pages/LocationSetting";
import OtherSettings from "./pages/OtherSettings";
function VerticalContent() {
  return (
    <>
      <div className="vertical_tabcontent">
        <Routes>
          <Route index element={<GeneralSettings />} />
          <Route path="generalsettings" element={<GeneralSettings />} />
          <Route path="othersettings" element={<OtherSettings />} />
          <Route path="googleaddress/*" element={<GoogleAddress />} />
          {/* <Route path="locationsetting" element={<LocationSetting />} /> */}
        </Routes>
      </div>
    </>
  );
}

export default VerticalContent;

// return (
//   <div class="verical_tabcontent">
//     <Routes>
//       <Route index element={<GeneralSettings />} />
//       <Route path="generalsettings" element={<GeneralSettings />} />
//       <Route path="othersettings" element={<OtherSettings />} />
//       <Route path="googleaddress" element={<GoogleAddress />} />
//     </Routes>
//   </div>
// );
