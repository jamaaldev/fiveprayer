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
import styled, { css } from 'styled-components';
import { useGetPrayerTimeTableQuery } from '../../../../../api/prayerTimeTableApi';
interface FivePrayerProps {
  readonly colorevenBg: string;
  readonly colorevenClr: string;
  readonly colorhighBg: string;
  readonly colorhighCrl: string;
  readonly colorsecondBg: string;
  readonly colorfirstBg: string;
  readonly colorfirstClr: string;

};

type Props = { firstBg: string, firstClr: string, secondBg: string, secondClr: string, rowEvenBg: string, rowEvenClr: string, rowHighlightBg: string, rowHighlightClr: string }

function CalendarMonthly({ firstBg, firstClr, secondBg, secondClr, rowEvenBg, rowEvenClr, rowHighlightBg, rowHighlightClr }: Props) {
  const { data: timetable, isFetching, isLoading } = useGetPrayerTimeTableQuery('fp_prayertimetable');
  const [month, SetMonth] = React.useState<FPCalendar[]>();
  const [switchHighLight, setSwitchHighLight] = React.useState(false);

  React.useEffect(() => {

    if (timetable?.length) {

      const newone = timetable?.filter((table: FPCalendar) => {
        return new Date(table.date).getFullYear() === new Date().getFullYear() && new Date(table.date).getMonth() === (Number(JSON.parse(sessionStorage?.getItem('monthselect') as string)?.monthNum) || new Date().getMonth());
      })
      SetMonth(newone)
    }
  }, [timetable, new Date().getMonth(), Number(JSON.parse(sessionStorage?.getItem('monthselect') as string)?.monthNum || new Date().getMonth()), 1])


  return (

    <FivePrinter colorevenBg={rowEvenBg} colorevenClr={rowEvenClr} colorhighBg={rowHighlightBg} colorhighCrl={rowHighlightClr} colorsecondBg={secondBg} colorfirstBg={firstBg} colorfirstClr={firstClr} className="fiveprayer__printer" id="fiveprayer__divTo">
      <table id='fiveprayer__divToPrint' className='fiveprayer__TablePrayer_'>
        {switchHighLight ?
          <tr id='today-row' className='demo-table-highlight'>
            <td>0 Highlight 2222</td>
            <td>5:19 AM</td>
            <td>5:19 AM</td>
            <td>5:19 AM</td>
            <td>5:19 AM</td>
            <td>5:19 AM</td>
            <td>5:19 AM</td>
            <td>5:19 AM</td>
            <td>5:19 AM</td>
            <td>5:19 AM</td>
            <td>5:19 AM</td>
            <td>5:19 AM</td>
          </tr>
          : ''
        }
        <thead id='fiveprayer__waa'>
          {switchHighLight ?
            <button className='show-highlight' onClick={() => setSwitchHighLight(false)}>Hide HighLight</button>
            :
            <button className='show-highlight' onClick={() => setSwitchHighLight(true)}>Show HighLight</button>

          }
          {/* <div className="fiveprayer__printer_option ">
            <form id="fiveprayer__noPrint">
              <select name="country">
                <option value="" disabled selected>--Select Months--</option>
                <option value="1">January</option>
                <option value="2">February</option>
                <option value="3">March</option>
                <option value="4">April</option>
                <option value="5">May</option>
                <option value="6">June </option>
                <option value="7">July</option>
                <option value="8">August</option>
                <option value="9">September</option>
                <option value="10">October</option>
                <option value="11">November</option>
                <option value="12">December</option>
              </select>
            </form>
            <input className='fiveprayer__clickPrint' id='fiveprayer__noPrint' type="button" value="print" />
          </div> */}
          <tr className="fiveprayer__tbmonthfirst" style={{ backgroundColor: firstBg, color: firstClr }}  >
            <th >
            </th>

            <th td colspan="3">Fajr</th>

            <th td colspan="2">Dhuhr</th>

            <th td colspan="2">Asr</th>

            <th td colspan="2">Maghrib</th>

            <th td colspan="2">Isha</th>

          </tr>

          <tr id="fiveprayer__tbmonthsecond" style={{ backgroundColor: secondBg, color: secondClr }}>
            <th>Date</th>
            <th> Begins</th>
            <th> Iqamah</th>
            <th>Sunrise</th>
            <th> Begins</th>
            <th> Iqamah</th>
            <th> Begins</th>
            <th> Iqamah</th>
            <th> Begins</th>
            <th> Iqamah</th>
            <th> Begins</th>
            <th> Iqamah</th>
          </tr>
        </thead>

        <tbody  >
          {month?.map((calendars: FPCalendar, index: number) => (
            <tr key={index} id={calendars?.today === new Date().getDate().toString() ? 'today-row' : null}>
              <td >{calendars?.currentDate}</td>
              <td>{calendars?.fajr_begins}</td>
              <td>{calendars?.fajr_iqamah}</td>
              {/* <td>{calendars?.fajr_masjid_jamaah}</td> */}
              <td>{calendars?.sunrise}</td>
              <td>{calendars?.dhuhr_begins}</td>
              <td>{calendars?.dhuhr_iqamah}</td>
              <td>{calendars?.asr_begins}</td>
              <td>{calendars?.asr_iqamah}</td>
              <td>{calendars?.maghrib_begins}</td>
              <td>{calendars?.maghrib_iqamah}</td>
              <td>{calendars?.isha_begins}</td>
              <td>{calendars?.isha_iqamah}</td>
            </tr>
          ))}

        </tbody>
      </table>

    </FivePrinter>

  )

}

const FivePrinter = styled.div<FivePrayerProps>`
   th,
     td {

        padding: 0 ;
        padding-inline: 3px ;
        padding-block: 7px ;
      
    }
#today-row{
  background-color: ${props => props.colorhighBg} ;
  color: ${props => props.colorhighCrl} !important;

}
tr:nth-child(even) {
  background-color: ${props => props.colorevenBg} ;
  color: ${props => props.colorevenClr} ;
}
#fiveprayer__tbmonthsecond{
  background-color:  ${props => props.colorsecondBg} !important;
}
.fiveprayer__tbmonthfirst {
  background-color: ${props => props.colorfirstBg} !important ;
  color: ${props => props.colorfirstClr} !important;
    }

`;



export default CalendarMonthly