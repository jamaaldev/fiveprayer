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
declare const FivePrayerStyleMonth;
export function TimeTableMonthly(props: ITimeTableMonthlyProps) {
  const [insertprayersettingmeta] = useInsertprayerSettingsMetaAPIMutation();
  
 
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
  // Start EvenRow
  const [colorEvenRowBg, setColorEvenRowBg] = React.useState(FivePrayerStyleMonth?.evenrowbg);
  const [colorEvenRowClr, setColorEvenRowClr] = React.useState(FivePrayerStyleMonth?.evenrowclr);
  const [colorEvenRowBgSave, setColorEvenRowBgSave] = React.useState({});
  const [colorEvenRowClrSave, setColorEvenRowClrSave] = React.useState({});

  // End EventRow
  const [colorHighLightRowBg, setColorHighLightRowBg] = React.useState("#73ff00");
  const [colorHighLightRowSave, setColorHighLightRowBgSave] = React.useState({});


  const saveColor = () =>{
    
    insertprayersettingmeta(colorFirstHeadBgSave);
    insertprayersettingmeta(colorFirstHeadClrSave);
    insertprayersettingmeta(colorSecondHeadBgSave);
    insertprayersettingmeta(colorSecondHeadClrSave);
    insertprayersettingmeta(colorEvenRowBgSave);
    insertprayersettingmeta(colorEvenRowClrSave);

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

  const eventRowBg = (value,meta) =>{
    setColorEvenRowBg(value)
    const colorSet = { value: value, meta: meta };
    setColorEvenRowBgSave(colorSet);
  }
  const eventRowClr = (value,meta) =>{
    setColorEvenRowClr(value)
    const colorSet = { value: value, meta: meta };
    setColorEvenRowClrSave(colorSet);
  }
  const eventRowHighlight = (value,meta) =>{
    setColorHighLightRowBg(value)
    const colorSet = { value: value, meta: meta };
    setColorHighLightRowBgSave(colorSet)
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
              <span>Second Head bg-Color</span>
              <HexAlphaColorPicker color={colorSecondHeadBg} onChange={(value) => secondHeadBg(value,'secondbg')} />
            </div>
            :
            <div className="second-clr">
              <span>Second Head ft-Color</span>
              <HexAlphaColorPicker color={colorSecondHeadClr} onChange={(value) => secondHeadClr(value,'secondclr')} />
            </div>
          }
            {/* End Second */}
            {/* Start Even */}
            { switchColor ?

            <div className="even-bg">
              <span>Even Row bg-Color</span>
              <HexAlphaColorPicker color={colorEvenRowBg} onChange={(value) => eventRowBg(value,'evenbg')}  />
            </div>
            :
            <div className="even-clr">
              <span>Even Row ft-Color</span>
              <HexAlphaColorPicker color={colorEvenRowClr} onChange={(value) => eventRowClr(value,'evenclr')}  />
            </div>
            }
              {/* End Even */}
            <div className="highlight">
              <span>HightLight Row Color</span>
              <HexAlphaColorPicker color={colorHighLightRowBg} onChange={(value) => eventRowHighlight(value,'highlightbg')} />
            </div>



          </div>
          <div className="calendar-prayer">
            <CalendarMonthly 
            firstBg={colorFirstHeadBg} 
            firstClr={colorFirstHeadClr} 
            secondBg={colorSecondHeadBg} 
            secondClr={colorSecondHeadClr} 
            rowEvenBg={colorEvenRowBg} 
            rowEvenClr={colorEvenRowClr} 
            rowHighlightBg={colorHighLightRowBg}/>

          </div>
        </div>
      </div>
    </div>
  );
}
