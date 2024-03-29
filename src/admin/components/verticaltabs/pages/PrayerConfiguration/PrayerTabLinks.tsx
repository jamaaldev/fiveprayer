import * as React from 'react';
import { NavLink } from 'react-router-dom';
import './prayertabs.scss';
export interface IPrayerTabLinksProps {}

export function PrayerTabLinks( props: IPrayerTabLinksProps ) {
	return (
		<div>
			<NavLink to={ '/settings/prayerconfigration/customlocation' }>
				<button className="tablink">Custom location</button>
			</NavLink>
		</div>
	);
}
