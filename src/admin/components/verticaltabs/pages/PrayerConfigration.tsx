import * as React from 'react';
import { PrayerContentRoutes } from './PrayerConfiguration/PrayerContentRoutes';
import { PrayerTabLinks } from './PrayerConfiguration/PrayerTabLinks';
function PrayerConfigration() {
  return (
    <>
      <div id='Google_Address' className='vertical_tabcontent'>
        <PrayerTabLinks />
        <PrayerContentRoutes />
      </div>
    </>
  );
}

export default PrayerConfigration;
