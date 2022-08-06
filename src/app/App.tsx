import * as React from "react";
import { HashRouter, Routes, Route } from "react-router-dom";
import Reset from "../admin/helper/Reset";
import Dashboard from "../admin/components/headertabs/pages/Dashboard";

import HeaderTabLinks from "../admin/components/headertabs/HeaderTabLinks";
import Settings from "../admin/components/headertabs/pages/Settings";
import Support from "../admin/components/headertabs/pages/Support";
import Templates from "../admin/components/headertabs/pages/Templates";
import HeaderContent from "../admin/components/headertabs/HeaderContent";
const App = () => {
  console.log('am in app')
  return (
    <div className="fiveprayer">
      <HashRouter>
        {/* <Reset /> */}
        <HeaderTabLinks />
        <Routes>
          <Route element={<HeaderContent />}>
            <Route path="/" element={<Dashboard />} />
            <Route path="/support" element={<Support />} />
            <Route path="/settings/*" element={<Settings />} />
            <Route path="/templates" element={<Templates />} />
          </Route>
        </Routes>
      </HashRouter>
    </div>
  );
};

export default App;
