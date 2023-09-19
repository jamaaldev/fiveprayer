import * as React from 'react';
import { CustomizingContentRoutes } from './CustomizingDesign/CustomizingContentRoutes';
import { CustomizingTabLinks } from './CustomizingDesign/CustomizingTabLinks';

function CustomizingDesign() {
	return (
		<>
			<div id="Google_Address" className="vertical_tabcontent">
				<CustomizingTabLinks />
				<CustomizingContentRoutes />
			</div>
		</>
	);
}

export default CustomizingDesign;
