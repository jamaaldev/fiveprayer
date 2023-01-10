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
import { ToastContainer, toast } from 'react-toastify';

type Props = {}

declare const FivePrayerPrinter;

function PrinterPageCustomizing({ }: Props) {
  const [insertprayersettingmeta] = useInsertprayerSettingsMetaAPIMutation();
  const [check,setchecked] = React.useState('false');
  console.log("📢[PrinterPageCustomizing.tsx:31]: check: ", check);
  const [printerPage, SetPrinterPage] = React.useState({
    printer_left1: FivePrayerPrinter?.printer_left1 || "",
    printer_left2: FivePrayerPrinter?.printer_left2 || "",
    printer_left3: FivePrayerPrinter?.printer_left3 || "",
    printer_left4: FivePrayerPrinter?.printer_left4 || "",
    printer_left5: FivePrayerPrinter?.printer_left5 || "",
    printer_left6: FivePrayerPrinter?.printer_left6 || "",
    printer_left7: FivePrayerPrinter?.printer_left7 || "",
    printer_right1: FivePrayerPrinter.printer_right1 || "",
    printer_right2: FivePrayerPrinter.printer_right2 || "",
    printer_right3: FivePrayerPrinter.printer_right3 || "",
    printer_right4: FivePrayerPrinter.printer_right4 || "",
    printer_right5: FivePrayerPrinter.printer_right5 || "",
    printer_right6: FivePrayerPrinter.printer_right6 || "",
    printer_right7: FivePrayerPrinter.printer_right7 || "",
    printer_boolean: FivePrayerPrinter.printer_boolean || 'false',
    printer_logo: FivePrayerPrinter.printer_logo || "https://fakeimg.pl/200x200/"
  });
 

    console.log("📢[PrinterPageCustomizing.tsx:50]: FivePrayerPrinter.printer_boolean: ", printerPage.printer_boolean);
  
  const imgID = React.useRef<HTMLImageElement>(null);
  const handleChange = (e) => {
    let { name, value,checked } = e.target;
    if(checked == true && name === 'printer_boolean' ){
      setchecked('true')
      value = 'true'
    } 
    if(checked == false && name === 'printer_boolean') {
      setchecked('false')
      value = 'false'

    }
    console.log("📢[PrinterPageCustomizing.tsx:54]: checked: ", checked);
    console.log("📢[PrinterPageCustomizing.tsx:54]: value: ", value);
    console.log("📢[PrinterPageCustomizing.tsx:54]: name: ", name);
    SetPrinterPage((prev) => {
      return { ...prev, [name]: value}
    })
    imgID!.current!.src = printerPage.printer_logo;
  }

  const savePrinterPage = async (e) => {
    e.preventDefault();

    const printerPages = { value: printerPage, meta: 'printer' };
      try {
        await insertprayersettingmeta(printerPages);
        toast.success('Your PrinterDetail Saved! Refresh it.', {
          position: "top-right",
          autoClose: 5000,
          hideProgressBar: false,
          closeOnClick: true,
          pauseOnHover: true,
          draggable: true,
          progress: undefined,
          theme: "light",
        });

      } catch (error) {

      }

  

  }
  return (
    <div id='Customizing' className='tabcontent'>
      <ToastContainer
        position="top-right"
        autoClose={5000}
        hideProgressBar={false}
        newestOnTop={false}
        closeOnClick
        rtl={false}
        pauseOnFocusLoss
        draggable
        pauseOnHover
        theme="light"
      />
      Printer Page Add Extra Information
      <PrinterContainer onSubmit={savePrinterPage} className='FP__input__container'>
        <input type="checkbox" onChange={handleChange} checked={JSON.parse(printerPage.printer_boolean)} value={`${check}`} name="printer_boolean" id="" />


        <div>
          <h1>Left Side</h1>
          <input className='FP__input' value={printerPage?.printer_left1} type='text' name='printer_left1' onChange={handleChange} placeholder='Add Details' />
          <input className='FP__input' value={printerPage?.printer_left2} type='text' name='printer_left2' onChange={handleChange} placeholder='Add Details' />
          <input className='FP__input' value={printerPage?.printer_left3} type='text' name='printer_left3' onChange={handleChange} placeholder='Add Details' />
          <input className='FP__input' value={printerPage?.printer_left4} type='text' name='printer_left4' onChange={handleChange} placeholder='Add Details' />
          <input className='FP__input' value={printerPage?.printer_left5} type='text' name='printer_left5' onChange={handleChange} placeholder='Add Details' />
          <input className='FP__input' value={printerPage?.printer_left6} type='text' name='printer_left6' onChange={handleChange} placeholder='Add Details' />
          <input className='FP__input' value={printerPage?.printer_left7} type='text' name='printer_left7' onChange={handleChange} placeholder='Add Details' />

        </div>

        <div className="profile-uploud" >

          <img ref={imgID} width="200" height="200" src={printerPage.printer_logo} />

          <input type="text" onChange={handleChange} name="printer_logo" placeholder='Add url link image' id="" />
          <input type="submit" value="Save" />



        </div>

        <div>
          <h1>Right Side</h1>
          <input className='FP__input' value={printerPage?.printer_right1} type='text' name='printer_right1' onChange={handleChange} placeholder='Add Details' />
          <input className='FP__input' value={printerPage?.printer_right2} type='text' name='printer_right2' onChange={handleChange} placeholder='Add Details' />
          <input className='FP__input' value={printerPage?.printer_right3} type='text' name='printer_right3' onChange={handleChange} placeholder='Add Details' />
          <input className='FP__input' value={printerPage?.printer_right4} type='text' name='printer_right4' onChange={handleChange} placeholder='Add Details' />
          <input className='FP__input' value={printerPage?.printer_right5} type='text' name='printer_right5' onChange={handleChange} placeholder='Add Details' />
          <input className='FP__input' value={printerPage?.printer_right6} type='text' name='printer_right6' onChange={handleChange} placeholder='Add Details' />
          <input className='FP__input' value={printerPage?.printer_right7} type='text' name='printer_right7' onChange={handleChange} placeholder='Add Details' />

        </div>

      </PrinterContainer>
    </div>

  )
}

const PrinterContainer = styled.form`
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