import * as React from "react";

import { Routes, Route } from "react-router-dom";
import GeneralSettings from "./pages/GeneralSettings";
import PrayerConfigration from "./pages/PrayerConfigration";
import CustomizingDesign from "./pages/CustomizingDesign";
function VerticalContent() {
  return (
    <>
      <div className="vertical_tabcontent">
        <Routes>
          <Route index element={<GeneralSettings />} />
          <Route path="generalsettings" element={<GeneralSettings />} />
          <Route path="customizingdesign/*" element={<CustomizingDesign />} />
          <Route path="prayerconfigration/*" element={<PrayerConfigration />} />
        </Routes>
      </div>
    </>
  );
}

export default VerticalContent;

