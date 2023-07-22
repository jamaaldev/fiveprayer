import * as React from 'react';
import { HashRouter, Routes, Route } from 'react-router-dom';
import PrayerSettings from '../admin/components/headertabs/pages/PrayerSettings';

import HeaderTabLinks from '../admin/components/headertabs/HeaderTabLinks';
import Settings from '../admin/components/headertabs/pages/Settings';
import Support from '../admin/components/headertabs/pages/Support';
import Welcome from '../admin/components/headertabs/pages/Welcome';
import HeaderContent from '../admin/components/headertabs/HeaderContent';
const App = () => {
	return (
		<div className="fiveprayer">
			<HashRouter>
				<HeaderTabLinks />
				<Routes>
					<Route element={ <HeaderContent /> }>
						<Route path="/" element={ <Welcome /> } />
						<Route
							path="prayersettings"
							element={ <PrayerSettings /> }
						/>
						<Route path="support" element={ <Support /> } />
						<Route path="settings/*" element={ <Settings /> } />
					</Route>
				</Routes>
			</HashRouter>
		</div>
	);
};

export default App;
