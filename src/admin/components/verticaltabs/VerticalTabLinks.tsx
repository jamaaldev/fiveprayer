import * as React from 'react';

import { NavLink } from 'react-router-dom';
import './css/VerticalTabLinks.scss';

function VerticalTabLinks() {
	return (
		<>
			<div className="vertical_tab">
				{ /* <NavLink to={"/settings/generalsettings"}>
          <button className="tablinks vertical_tab">General Settings</button>
        </NavLink> */ }
				<NavLink to={ '/settings/prayerconfigration' }>
					<button className="tablinks vertical_tab">
						Prayer Configuration
					</button>
				</NavLink>

				<NavLink to={ '/settings/customizingdesign' }>
					<button className="tablinks vertical_tab">
						Customizing Design
					</button>
				</NavLink>
			</div>
		</>
	);
}

export default VerticalTabLinks;
