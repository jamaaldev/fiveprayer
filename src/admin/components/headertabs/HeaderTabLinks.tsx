import * as React from 'react';

import { NavLink } from 'react-router-dom';

import './css/HeaderTabLinks.scss';

const HeaderTabLinks = () => {
	return (
		<>
			<div className="tab">
				<div className="logo">
					{ /* <img className="logos" src="/" alt="logo" width="120px"/> */ }
					<p className="five">Five</p>{ ' ' }
					<span className="prayer">Prayer</span>
					{ /* you can delete h3 after you insert your svg or img logo in img element */ }
				</div>
				<NavLink to={ '/' } end>
					<button className="tablinks dashboard">Welcome</button>
				</NavLink>
				<NavLink to={ '/prayersettings' }>
					<button className="tablinks prayer">Prayer Settings</button>
				</NavLink>
				<NavLink to={ '/settings/moresettings' }>
					<button className="tablinks settings">More Settings</button>
				</NavLink>
				{ /* <NavLink to={"/support"}>
          <button className="tablinks support">Support</button>
        </NavLink> */ }
			</div>
		</>
	);
};

export default HeaderTabLinks;
