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

import React from 'react'
import styled from 'styled-components'
import { useInsertprayerSettingsMetaAPIMutation } from '../../../../../api/prayerSettingsMetaAPI';
import '../../../../elements/css/FPInput.scss';

type Props = {}

function PrinterPageCustomizing({ }: Props) {
  const [insertprayersettingmeta] = useInsertprayerSettingsMetaAPIMutation();

  const [printerPage, SetPrinterPage] = React.useState({
    printer_left1: "",
    printer_left2: "",
    printer_left3: "",
    printer_left4: "",
    printer_left5: "",
    printer_left6: "",
    printer_left7: "",
    printer_right1: "",
    printer_right2: "",
    printer_right3: "",
    printer_right4: "",
    printer_right5: "",
    printer_right6: "",
    printer_right7: ""
  });

  const handleChange = (e) =>{
    const {name,value} = e.target;
    SetPrinterPage((prev) =>{
      return{...prev,[name]: value}
    })
  }
  const imgID = React.useRef<HTMLImageElement>(null);
  const ImageLoad = (file) => {
    let [imageName] = file.target.files;

    if (imageName) {
      // make sure to use this ! mark if you see Object is possibly 'undefined' etc.
      imgID!.current!.src = URL.createObjectURL(imageName);
    }
  }
  const savePrinterPage = (e) =>{
    e.preventDefault();
    const printerPages = { value: printerPage, meta: 'printer' };
    insertprayersettingmeta(printerPages);

  }
  return (
    <div id='printer-page' className='tabcontent'>
      Printer Page Add Extra Information
      <PrinterContainer className='FP__input__container'>


        <form onSubmit={savePrinterPage}>
          <div>
            <h1>Left Side</h1>
            <input className='FP__input' type='text' name='printer_left1' onChange={handleChange} placeholder='Add Details' />
            <input className='FP__input' type='text' name='printer_left2' onChange={handleChange} placeholder='Add Details' />
            <input className='FP__input' type='text' name='printer_left3' onChange={handleChange} placeholder='Add Details' />
            <input className='FP__input' type='text' name='printer_left4' onChange={handleChange} placeholder='Add Details' />
            <input className='FP__input' type='text' name='printer_left5' onChange={handleChange} placeholder='Add Details' />
            <input className='FP__input' type='text' name='printer_left6' onChange={handleChange} placeholder='Add Details' />
            <input className='FP__input' type='text' name='printer_left7' onChange={handleChange} placeholder='Add Details' />

          </div>

          <div className="profile-uploud" >
            
              <img ref={imgID} width="200" height="200" src="https://fakeimg.pl/200x200/" />

              <input type="file" className='FP__input' onChange={ImageLoad} name="avatar" accept="image/png, image/gif, image/jpeg" />

            

          </div>

          <div>
            <h1>Right Side</h1>
            <input className='FP__input' type='text' name='printer_right1' onChange={handleChange} placeholder='Add Details' />
            <input className='FP__input' type='text' name='printer_right2' onChange={handleChange} placeholder='Add Details' />
            <input className='FP__input' type='text' name='printer_right3' onChange={handleChange} placeholder='Add Details' />
            <input className='FP__input' type='text' name='printer_right4' onChange={handleChange} placeholder='Add Details' />
            <input className='FP__input' type='text' name='printer_right5' onChange={handleChange} placeholder='Add Details' />
            <input className='FP__input' type='text' name='printer_right6' onChange={handleChange} placeholder='Add Details' />
            <input className='FP__input' type='text' name='printer_right7' onChange={handleChange} placeholder='Add Details' />

          </div>
          <input type="submit" value="Save" />
        </form>
      </PrinterContainer>
    </div>

  )
}

const PrinterContainer = styled.div`
        display: flex;
        justify-content: space-around;
        align-items: center;
        div{
          width: 100%;
    }
    .profile-uploud{
      width:200px;
      margin: 5px;
    }
        `;
export default PrinterPageCustomizing