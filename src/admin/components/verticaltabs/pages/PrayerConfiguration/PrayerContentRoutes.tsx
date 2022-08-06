import * as React from 'react';
import { Route, Routes } from 'react-router-dom';

import GoogleAddress from '../GoogleAddress';
import { LocationSetting } from '../LocationSetting';
import { PrayerConfig } from './PrayerConfig';

export interface IPrayerContentRoutesProps {}

export function PrayerContentRoutes(props: IPrayerContentRoutesProps) {
  return (
    <div>
      <Routes>
        <Route path='googleaddress/*' element={<GoogleAddress />} />

        <Route path='location' element={<PrayerConfig />} />
        <Route path="locationsetting" element={<LocationSetting />} />

      </Routes>
    </div>
  );
}
