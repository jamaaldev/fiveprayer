import * as React from "react";
import VerticalContent from "../../verticaltabs/VerticalContent";
import VerticalTabLinks from "../../verticaltabs/VerticalTabLinks";
function GeneralSettings() {
  return (
    <>
      <div className="vertical_tab_container">
        <div className="vertical_tab_container_both">
          <VerticalTabLinks />
          <VerticalContent />
        </div>
      </div>
    </>
  );
}

export default GeneralSettings;
