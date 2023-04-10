import * as React from 'react';
import { Route, Routes } from 'react-router-dom';

import PrayerConfigration from '../PrayerConfigration';
import { CustomLocation } from './CustomLocation';

export interface IPrayerContentRoutesProps {}

export function PrayerContentRoutes(props: IPrayerContentRoutesProps) {
  return (
    <div>
      <Routes>
        <Route path='prayerconfigration/*' element={<PrayerConfigration />} />
        <Route path="customlocation" element={<CustomLocation />} />

      </Routes>
    </div>
  );
}
