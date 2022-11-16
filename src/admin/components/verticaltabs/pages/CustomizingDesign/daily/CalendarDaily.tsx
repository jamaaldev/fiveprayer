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
type Props = {}
// import "./daily.scss";
function CalendarDaily({ }: Props) {
  return (
    <div>
      <table className="FP_DairyPrayer_ FP_DairyPrayerf_">
        <thead>
          <tr>
          </tr><tr>
            <td colspan="3">
              <span>
                16 November 2022
              </span>

              <div className="fiveprayer__iqamah_next" >FAJR IQAMAH</div>
              <div className="fiveprayer__iqamah_time" style={{padding: "20px"}}> 4:28 AM</div>





            </td>
          </tr>

          <tr id="fiveprayer__tbmonthsecond">
            <th>Prayer</th>
            <th>Begins</th>
            <th>Iqamah</th>
          </tr>
          <tr id="today-row">
            <th>Fajr</th>
            <td>4:28 AM </td>
            <td>4:28 AM </td>
          </tr>
          <tr id="">
            <th>Sunrise</th>
            <td colspan="2">5:43 AM </td>

          </tr>
          <tr id="">
            <th>Dhuhr</th>
            <td>11:43 AM </td>
            <td>11:43 AM </td>
          </tr>
          <tr id="">
            <th>Asr</th>
            <td>3:07 PM </td>
            <td>3:07 PM </td>
          </tr>
          <tr id="">
            <th>Maghrib</th>
            <td>5:44 PM </td>
            <td>5:44 PM </td>
          </tr>
          <tr id="">
            <th>Isha</th>
            <td>7:14 PM </td>
            <td>7:14 PM </td>
          </tr>



        </thead>

      </table>
    </div>
  )
}

export default CalendarDaily