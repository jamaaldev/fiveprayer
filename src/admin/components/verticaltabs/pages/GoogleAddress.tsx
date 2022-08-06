import * as React from 'react';
import { NavLink } from 'react-router-dom';
import { PrayerContentRoutes } from './PrayerConfiguration/PrayerContentRoutes';
import { PrayerTabLinks } from './PrayerConfiguration/PrayerTabLinks';
// import './PrayerConfiguration/prayertabs.scss';
function GoogleAddress() {
  return (
    <>
      <div id='Google_Address' className='vertical_tabcontent'>
        <PrayerTabLinks />
        <PrayerContentRoutes />
      </div>
    </>
  );
}

export default GoogleAddress;
