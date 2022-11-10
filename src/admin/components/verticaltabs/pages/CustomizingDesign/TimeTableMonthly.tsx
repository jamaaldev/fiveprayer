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
import CalendarMonthly from './CalendarMonthly';
import { HexAlphaColorPicker } from "react-colorful";
import "../css/ColorPicker.scss"
import { useInsertprayerSettingsMetaAPIMutation } from '../../../../api/prayerSettingsMetaAPI';
export interface ITimeTableMonthlyProps {
}

export function TimeTableMonthly(props: ITimeTableMonthlyProps) {
  const [colorFirstHead, setColorFirstHead] = React.useState("#000102");
  const [colorSecondHead, setColorSecondHead] = React.useState("#ff7700");
  const [colorEvenRow, setColorEvenRow] = React.useState("#0059ff");
  const [colorHighLightRow, setColorHighLightRow] = React.useState("#73ff00");
  const [insertprayersettingmeta] = useInsertprayerSettingsMetaAPIMutation();

  const firstHead = (value,meta) =>{
    setColorFirstHead(value)
    const colorSet = { value: value, meta: meta };
    insertprayersettingmeta(colorSet);
  }
  const secondHead = (value,meta) =>{
    setColorSecondHead(value)
    const colorSet = { value: value, meta: meta };
    insertprayersettingmeta(colorSet);
  }
  const eventRow = (value,meta) =>{
    setColorEvenRow(value)
    const colorSet = { value: value, meta: meta };
    // insertprayersettingmeta(colorSet);
  }
  const eventRowHighlight = (value,meta) =>{
    setColorHighLightRow(value)
    const colorSet = { value: value, meta: meta };
    // insertprayersettingmeta(colorSet);
  }
  return (
    <div>
      <div id='Customizing' className='tabcontent'>
        <h3>TimeTableMonthly</h3>
        <p>Customizing TimeTable Theme</p>
        <div className="container">
          <div className="clr-picker">
            <div className="first">
              <span>First Head Color</span>
              <HexAlphaColorPicker color={colorFirstHead} onChange={(value) => firstHead(value,'first')} />
            </div>
            <div className="second">
              <span>Second Head Color</span>
              <HexAlphaColorPicker color={colorSecondHead} onChange={(value) => secondHead(value,'second')} />
            </div>

            <div className="even">
              <span>Even Row Color</span>
              <HexAlphaColorPicker color={colorEvenRow} onChange={(value) => eventRow(value,'even')}  />
            </div>
            <div className="highlight">
              <span>HightLight Row Color</span>
              <HexAlphaColorPicker color={colorHighLightRow} onChange={(value) => eventRowHighlight(value,'highlight')} />
            </div>



          </div>
          <div className="calendar-prayer">
            <CalendarMonthly first={colorFirstHead} second={colorSecondHead} rowEven={colorEvenRow} rowHighlight={colorHighLightRow}/>

          </div>
        </div>
      </div>
    </div>
  );
}
