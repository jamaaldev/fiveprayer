// Copyright (C) 2022 Jamaal
// 
// This file is part of FivePrayer.
// 
// FivePrayer is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
// 
// FivePrayer is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
// 
// You should have received a copy of the GNU General Public License
// along with FivePrayer.  If not, see <http://www.gnu.org/licenses/>.

import * as React from 'react';
import { Route, Routes } from 'react-router-dom';
import CustomizingDesign from '../CustomizingDesign';
import TimeTableDaily from './daily/TimeTableDaily';
import { TimeTableMonthly } from './monthly/TimeTableMonthly';


export interface ICustomizingContentRoutesProps {}

export function CustomizingContentRoutes(props: ICustomizingContentRoutesProps) {
  return (
    <div>
      <Routes>
        <Route path='customizingdesign/*' element={<CustomizingDesign />} />
        <Route path="timetable" element={<TimeTableMonthly />} />
      </Routes>
    </div>
  );
}
