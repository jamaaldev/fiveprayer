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
import { useGetprayerSettingsMetaAPIQuery, useInsertprayerSettingsMetaAPIMutation } from '../../../../api/prayerSettingsMetaAPI';
export interface ITimeTableMonthlyProps {
}
declare const FivePrayerStyleMonth;
export function TimeTableMonthly(props: ITimeTableMonthlyProps) {
  const [insertprayersettingmeta] = useInsertprayerSettingsMetaAPIMutation();
  
  console.log("📢[TimeTableMonthly.tsx:30]: FivePrayerStyleMonth?.firstbg: ", FivePrayerStyleMonth?.firstbg);
  console.log("📢[TimeTableMonthly.tsx:30]: FivePrayerStyleMonth?.secondbg: ", FivePrayerStyleMonth?.secondbg);
  const [switchColor, setSwitchColor] = React.useState(true);
  // End Switch
  const [colorFirstHeadBg, setColorFirstHeadBg] = React.useState(FivePrayerStyleMonth?.firstbg);
  const [colorFirstHeadClr, setColorFirstHeadClr] = React.useState(FivePrayerStyleMonth?.firstclr);
  const [colorFirstHeadBgSave, setColorFirstHeadBgSave] = React.useState({});
  const [colorFirstHeadClrSave, setColorFirstHeadClrSave] = React.useState({});
  // end first
  const [colorSecondHeadBg, setColorSecondHeadBg] = React.useState(FivePrayerStyleMonth?.secondbg);
  const [colorSecondHeadClr, setColorSecondHeadClr] = React.useState(FivePrayerStyleMonth?.secondclr);
  const [colorSecondHeadBgSave, setColorSecondHeadBgSave] = React.useState({});
  const [colorSecondHeadClrSave, setColorSecondHeadClrSave] = React.useState({});
  // end second
  const [colorEvenRow, setColorEvenRow] = React.useState("#0059ff");
  const [colorHighLightRow, setColorHighLightRow] = React.useState("#73ff00");


  const saveColor = () =>{
    
    insertprayersettingmeta(colorFirstHeadBgSave);
    insertprayersettingmeta(colorFirstHeadClrSave);
    insertprayersettingmeta(colorSecondHeadBgSave);
    insertprayersettingmeta(colorSecondHeadClrSave);
  }
  const firstHeadBg = (value,meta) =>{
    setColorFirstHeadBg(value)
    const colorSet = { value: value, meta: meta };
    setColorFirstHeadBgSave(colorSet)
  }
  const firstHeadClr = (value,meta) =>{
    setColorFirstHeadClr(value)
    const colorSet = { value: value, meta: meta };
    setColorFirstHeadClrSave(colorSet);
  }
  // End FirstHead

  // Start SecondHead
  const secondHeadBg = (value,meta) =>{
    setColorSecondHeadBg(value)
    const colorSet = { value: value, meta: meta };
    setColorSecondHeadBgSave(colorSet)
  }
  const secondHeadClr = (value,meta) =>{
    setColorSecondHeadClr(value)
    const colorSet = { value: value, meta: meta };
    setColorSecondHeadClrSave(colorSet)
  }
  // End SecondHead

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
            <div className="color-switch">
              <button onClick={() =>saveColor()}>Save Theme</button>
              <button onClick={() =>setSwitchColor(true)}>Bg-Color</button>
              <button onClick={() =>setSwitchColor(false)} >Ft-Color</button>
            </div>
          <div className="clr-picker">
            {/* Start First */}
            { switchColor ?
            <div className="first-bg">
              <span>First Head bg-color</span>
              <HexAlphaColorPicker color={colorFirstHeadBg} onChange={(value) => firstHeadBg(value,'firstbg')} />
            </div>
            :
            <div className="first-clr">
              <span>First Head ft-Color</span>
              <HexAlphaColorPicker color={colorFirstHeadClr} onChange={(value) => firstHeadClr(value,'firstclr')} />
            </div>

            }
            {/* End First */}

            {/* Start Second */}
            {
              switchColor ?
              <div className="second-bg">
              <span>Second Head Color</span>
              <HexAlphaColorPicker color={colorSecondHeadBg} onChange={(value) => secondHeadBg(value,'secondbg')} />
            </div>
            :
            <div className="second-clr">
              <span>Second Head ft-Color</span>
              <HexAlphaColorPicker color={colorSecondHeadClr} onChange={(value) => secondHeadClr(value,'secondclr')} />
            </div>
          }
            {/* End Second */}
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
            <CalendarMonthly 
            firstBg={colorFirstHeadBg} 
            firstClr={colorFirstHeadClr} 
            secondBg={colorSecondHeadBg} 
            secondClr={colorSecondHeadClr} 
            rowEven={colorEvenRow} 
            rowHighlight={colorHighLightRow}/>

          </div>
        </div>
      </div>
    </div>
  );
}
