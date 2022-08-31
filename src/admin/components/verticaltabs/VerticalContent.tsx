import * as React from "react";

import { Routes, Route } from "react-router-dom";
import GeneralSettings from "./pages/GeneralSettings";
import PrayerConfigration from "./pages/PrayerConfigration";
import OtherSettings from "./pages/OtherSettings";
function VerticalContent() {
  return (
    <>
      <div className="vertical_tabcontent">
        <Routes>
          <Route index element={<GeneralSettings />} />
          <Route path="generalsettings" element={<GeneralSettings />} />
          <Route path="othersettings" element={<OtherSettings />} />
          <Route path="prayerconfigration/*" element={<PrayerConfigration />} />
        </Routes>
      </div>
    </>
  );
}

export default VerticalContent;

