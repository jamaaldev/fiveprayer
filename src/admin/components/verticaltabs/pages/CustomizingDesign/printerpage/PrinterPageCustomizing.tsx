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
import '../../../../elements/css/FPInput.scss';

type Props = {}

function PrinterPageCustomizing({ }: Props) {
const imgID =  React.useRef<HTMLImageElement>(null);
  const ImageLoad = (file) =>{
    console.log("📢[PrinterPageCustomizing.tsx:27]: file: ", file.target.files);
    let [imageName] = file.target.files;
    console.log("📢[PrinterPageCustomizing.tsx:27]: imageName: ", imageName);

    if(imageName){
        // make sure to use this ! mark if you see Object is possibly 'undefined' etc.
        imgID.current!.src  = URL.createObjectURL(imageName);
    }
  }
  return (
    <div id='printer-page' className='tabcontent'>
      Printer Page Add Extra Information
      <PrinterContainer className='FP__input__container'>


        <div>
          <h1>Left Side</h1>
          <input className='FP__input' type='text' name='Add Details' placeholder='Add Details' />
          <input className='FP__input' type='text' name='Add Details' placeholder='Add Details' />
          <input className='FP__input' type='text' name='Add Details' placeholder='Add Details' />
          <input className='FP__input' type='text' name='Add Details' placeholder='Add Details' />
          <input className='FP__input' type='text' name='Add Details' placeholder='Add Details' />
          <input className='FP__input' type='text' name='Add Details' placeholder='Add Details' />
          <input className='FP__input' type='text' name='Add Details' placeholder='Add Details' />

        </div>

        <div className="profile-uploud" >
          <form  onChange={ImageLoad}>
          <img ref={imgID}  width="200" height="200" src="https://fakeimg.pl/200x200/" />
          

          <input type="file" className='FP__input'   name="avatar" accept="image/png, image/gif, image/jpeg" />

          </form>

        </div>

        <div>
          <h1>Right Side</h1>
          <input className='FP__input' type='text' name='Add Details' placeholder='Add Details' />
          <input className='FP__input' type='text' name='Add Details' placeholder='Add Details' />
          <input className='FP__input' type='text' name='Add Details' placeholder='Add Details' />
          <input className='FP__input' type='text' name='Add Details' placeholder='Add Details' />
          <input className='FP__input' type='text' name='Add Details' placeholder='Add Details' />
          <input className='FP__input' type='text' name='Add Details' placeholder='Add Details' />
          <input className='FP__input' type='text' name='Add Details' placeholder='Add Details' />

        </div>

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